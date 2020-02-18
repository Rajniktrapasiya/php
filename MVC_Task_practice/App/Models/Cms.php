<?php

namespace App\Models;

use PDO;
use PDOException;

class PagesAdd extends \Core\Model {
    public function pagesExecute($Query,$return=[]) {
        try {
            $db = self::getDB();
            $db->query($Query);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function pagesFatch($Query) {
        try {
            $db = self::getDB();
            $stmt = $db->query($Query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCmsPages() {
        $selectQuery = "SELECT * FROM `cms_pages`";
        $result = self :: pagesFatch($selectQuery);
        return $result;
    }

    public function getCmsForEdit($param) {
        $selectCmsQuery = "SELECT `page_title`, `url_key`, `status`, `content` FROM `cms_pages` WHERE cms_pages_id = ".$param['value'];
        $get = self :: pagesFatch($selectCmsQuery);
        return $get;
    }

    public function insertIntoCms($postData) {
        $insertCmsQuery = "INSERT INTO `cms_pages`(`page_title`, `url_key`, `status`, `content`) VALUES (";
        foreach ($postData as $key => $value) {
            $insertCmsQuery .= "'".$value."',";
        }
        $insertCmsQuery = substr($insertCmsQuery,0,-1);
        $insertCmsQuery .= ")";
        // echo "<br>".$insertCmsQuery;
        self :: pagesExecute($insertCmsQuery);
    }

    public function updateCms($param) {
        $updateCmsQuery = "UPDATE `cms_pages` SET ";
        
        foreach ($_POST['cms'] as $key => $value) {
            $updateCmsQuery .= $key ."=\"". $value."\",";
        }
        $updateCmsQuery = substr($updateCmsQuery,0,-1);
        $updateCmsQuery .= " WHERE cms_pages_id = ".$param['value'];
        // echo "<br>".$updateCmsQuery;
        self :: pagesExecute($updateCmsQuery);
    }

    public function deleteCms($param) {
        $deleteQuery = "DELETE FROM `cms_pages` WHERE cms_pages_id = ".$param['value'];
        self :: pagesExecute($deleteQuery);
    }
}

?>