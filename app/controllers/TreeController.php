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
        $this->tree->initTest();
        die;
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
        $allGraphData = $this->tree->getGraphData();
        $graphData = [];
        $elementData = [];
        $conditionsKeys = array_keys($conditions);
        foreach ($conditionsKeys as $key) {
            $elementData[$key] = 0;
        }
        foreach ($allGraphData as $data) {
            if (empty($graphData[$data['type']])) {
                $graphData[$data['type']] = $elementData;
            }
            $graphData[$data['type']][$data['state']] = (int) $data['count'];
        }
        $typesLabels = [];
        $countsData = [];
        foreach ($graphData as $treeType => $counts) {
            foreach ($counts as $state => $count) {
                $countsData[$state][] = $count;
            }
            $typesLabels[] = $types[$treeType];
        }
        $this->render($pageName, [
            'countsData' => $countsData,
            'typesLabels' => $typesLabels,
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
        $trees = $this->tree->getTrees();
        $condition = new Condition();
        $treeImages = $condition->getArrayDataForTable('imageSrc');
        $conditions = $condition->getArrayDataForTable('type');
        $type = new Type();
        $types = $type->getArrayDataForTable('title');
        $allGraphData = $this->tree->getGraphData();
        $graphData = [];
        $elementData = [];
        $conditionsKeys = array_keys($conditions);
        foreach ($conditionsKeys as $key) {
            $elementData[$key] = 0;
        }
        foreach ($allGraphData as $data) {
            if (empty($graphData[$data['type']])) {
                $graphData[$data['type']] = $elementData;
            }
            $graphData[$data['type']][$data['state']] = (int) $data['count'];
        }
        $typesLabels = [];
        $countsData = [];
        foreach ($graphData as $treeType => $counts) {
            foreach ($counts as $state => $count) {
                $countsData[$state][] = $count;
            }
            $typesLabels[] = $types[$treeType];
        }
        $this->render('graph', [
            'countsData' => $countsData,
            'typesLabels' => $typesLabels,
            'trees' => $trees,
            'treeImages' => $treeImages,
            'conditions' => $conditions,
            'types' => $types,
        ]);
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
