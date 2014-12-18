AXDBTool
=======
The simply MYSQL operator without (or less) sql string.
=======
The table of example in below is named 'tbl_user';
```html
<?php 

include __dir__.'/AXDBTool/DBModel.php';
 
//insert:
DBModel::instance('tbl_user')->insert(array('name'=>'wanyaxing','age'=>28));

//update
DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->update(array('name'=>'wanyaxing','age'=>28));

//find the results with list(array)
$userModelList = DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->select();

//find the first result in list
$userModel = DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->selectSingle();

//search

//cache use

//countAll
//...


```
