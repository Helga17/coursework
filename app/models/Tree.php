<?php

namespace app\models;

class Tree extends BaseModel
{
    public $id;
    public $type;
    public $lat;
    public $lng;
    public $stature;
    public $diameter;
    public $state;
    public $user_id;
    public $is_active;

    public function __construct(array $params = []) {
        parent::__construct();
        if (!count($params)) {
            return;
        }
        $id = $params['id'] ?? null;
        if ($id = (int) $id) {
            $this->id = $id;
        }
        $this->type = $params['type'] ?? null;
        $this->lat = $params['lat'] ?? null;
        $this->lng = $params['lng'] ?? null;
        $this->stature = $params['stature'] ?? null;
        $this->diameter = $params['diameter'] ?? null;
        $this->state = $params['state'] ?? null;
        $this->user_id = $_SESSION['id'] ?? null;
        $this->is_active = (int) ($_SESSION['is_admin'] ?? false);
    }

    private function getRequiredParamsForCreate() {
        return [
            'type',
            'lat',
            'lng',
            'stature',
            'diameter',
            'state',
            'user_id',
        ];
    }

    private function getTreesSql(): string {
        return 'select * from tree';
    }

    private function checkIsCreator() {
        return count(
            $this->select('SELECT * FROM tree WHERE id = ' . $this->id . ' AND user_id = ' . ($_SESSION['id'] ?? 0))
        );
    }

    private function checkPermission() {
        return $this->id && (($_SESSION['is_admin'] ?? false) || $this->checkIsCreator());
    }

    public static function getTableName(): string {
        return 'tree';
    }

    public function getTrees() {
        return $this->select($this->getTreesSql());
    }

    public function createObject() {
        $params = [];
        $requiredParams = $this->getRequiredParamsForCreate();
        foreach ($this as $key => $value) {
            if (!is_null($value) && $key !== 'connection') {
                $params[$key] = $value;
            } elseif (in_array($key, $requiredParams)) {
                return 'Missing ' . $key;
            }
        }
        $this->create($params);
        return $this->select('SELECT id FROM tree WHERE user_id = ' . $this->user_id . ' ORDER BY id DESC LIMIT 1')[0]['id'];
    }

    public function removeObject() {
        if ($this->checkPermission()) {
            $this->delete($this->id);
            return '';
        }
        return 'You arn`t have permission';
    }

    public function updateObject() {
        if ($this->checkPermission()) {
            $params = [];
            foreach ($this as $key => $value) {
                if (!is_null($value) && $key !== 'connection') {
                    $params[$key] = $value;
                }
            }
            $this->update($this->id, $params);
            return '';
        }
        return 'You arn`t have permission';
    }

    public function getGraphData() {
        return $this->select('
            select state, `type`, count(id) `count`
            from tree
            group by `type`, state
        ');
    }
}