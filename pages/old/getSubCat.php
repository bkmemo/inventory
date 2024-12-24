<?php
    $out = [];
	$out = [
                ['id'=>'1', 'name'=>'name1'],
                ['id'=>'2', 'name'=>'name2']
            ];
			/*
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
			$out = [
                ['id'=>'1', 'name'=>'name1'],
                ['id'=>'2', 'name'=>'name2']
            ];
            //$out = self::getSubCatList($cat_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat-id-2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo json_encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }*/
    echo json_encode(['output'=>$out, 'selected'=>'']);
?>