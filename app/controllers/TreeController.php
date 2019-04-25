<?php

namespace app\controllers;

use app\models\Condition;
use app\models\Tree;
use app\models\Type;

class TreeController extends BaseController
{
    private $tree;
    private $requestTree;

    public function __construct() {
        $this->tree = new Tree();
        $requestData = $this->getRequestData();
        if (is_null($requestData) || !is_array($requestData)) {
            return;
        }
        $this->requestTree = new Tree($requestData);
    }

    private function buildPage(string $pageName) {
        $trees = $this->tree->getTrees();
        $condition = new Condition();
        $treeImages = $condition->getArrayDataForTable('imageSrc');
        $conditions = $condition->getArrayDataForTable('type');
        $type = new Type();
        $types = $type->getArrayDataForTable('title');
        $this->render($pageName, [
                'trees' => $trees,
                'treeImages' => $treeImages,
                'conditions' => $conditions,
                'types' => $types,
        ]);
    }

    public function actionIndex() {
        $this->buildPage('index');
    }

    public function actionList() {
        $this->buildPage('list');
    }

    public function actionTable() {
        $this->buildPage('table');
    }

    public function actionGraph() {
        $allGraphData = $this->tree->getGraphData();
        $graphData = [];
        foreach ($allGraphData as $data) {
            $graphData[$data['type']][$data['state']] = $data['count'];
        }
        $this->render('graph', ['graphData' => $graphData]);
    }

    public function actionAdd() {
        echo $this->requestTree->createObject();
    }

    public function actionUpdate() {
        echo $this->requestTree->updateObject();
    }

    public function actionRemove() {
        echo $this->requestTree->removeObject();
    }

    public function actionGetImage() {

    }
}