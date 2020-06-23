<?php

// including the config file
include('config.php');
$pdo = connect();
// select all items ordered by item_order
$sql = 'SELECT * FROM items ORDER BY item_order ASC';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drag and Drop using jQuery and Ajax</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
     <a href="javascript:void();" onClick="add();">Add</a>
     <script>
		 function add()
		 {
			 id = 10;
			$( "#sortable" ).append( $( '<li id="5">'+
					'<span></span>'+
					'<img src="images/demo_5.jpg">'+
					'<div><h2>item 5</h2>Lorem ipsum dolor sit amet,'+ 
					'consectetur adipisicing elit, sed do eiusmod tempor incididunt'+ 
					'ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud '+
					'exercitation ullamco laboris nisi ut aliquip ex ea commodo'+
					 'consequat. Duis aute irure dolor in reprehenderit in voluptate '+
					 'velit esse cillum dolore eu fugiat nulla pariatur.</div>'+
					 '<a href="javascript:void();" onclick="delete_li('+id+');">Delete</a>'+
				'</li>' ) );
		 }
		 function delete_li(id)
		 {
		   $( "#"+id ).remove();
		 }
	 </script>
    <div class="container">
        <h1 class="main_title">Drag and Drop using jQuery and Ajax</h1>
        <div class="content">

        <ul id="sortable">
            <?php
            foreach ($list as $rs) {
            ?>
            <li id="<?php echo $rs['id']; ?>">
                <span></span>
                <img src="<?php echo $rs['photo']; ?>">
                <div><h2><?php echo $rs['title']; ?></h2><?php echo $rs['description']; ?></div>
                <a href="javascript:void();" onclick="delete_li(<?php echo $rs['id']; ?>);">Delete</a>
            </li>
            <?php
            }
            ?>
        </ul>
        </div><!-- content --> 
    </div><!-- container -->
</body>
</html>
