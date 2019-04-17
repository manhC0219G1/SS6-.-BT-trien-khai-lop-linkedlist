<?php

class LinkList
{
    private $firstNode;

    private $lastNode;
    private $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    public function insertFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->firstNode;
        $this->firstNode = $link;
        if ($this->lastNode == NULL)
            $this->lastNode = $link;

        $this->count++;
    }

    public function insertLast($data)
    {
        if ($this->firstNode != NULL) {
            $link = new Node($data);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = $link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != NULL) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }


    public function findNode($index)
    {
        if ($index >= 0 && $index < count($this->readList())) {
            $arrayData = $this->readList();
            $dataFind = $arrayData[$index];
            $node = $this->firstNode;

            for ($index = 0; $index < count($arrayData); $index++) {
                if ($dataFind == $node->data) {
                    return $node;
                } else {
                    $node = $node->next;
                }
            }
        } else {
            echo "not in array";
        }
    }

    public function add($indexAdd, $dataAdd)
    {
        $nodeLeft = $this->findNode($indexAdd - 1);
        $nodeAdd = new Node($dataAdd);
        $nodeAdd->next = $nodeLeft->next;
        $nodeLeft->next = $nodeAdd;
    }
}

?>