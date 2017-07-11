<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Projekt graficzy - magazyndetektyw.pl <?php //echo $title; ?></title>
<!-- Latest compiled and minified CSS -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/css");?>/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
	html{
	}

	/* Main project img */
	body {
		margin: 0;
		width:100%;
		height:<?php $size = getimagesize(getLayout($dbquerylayout)); echo $size[1];?>;
		background-color: black;
		background:url(<?php //echo $this->project->getLayout($data['dbquerylayout']);?>) center top no-repeat;
		background:url(<?php echo getLayout($dbquerylayout);?>) center top no-repeat;
		color: red;
	}
	
	/* Custom menus, na kiedyś */
	#main > div {
		position: fixed;
		height: 100px;
		border-bottom: 0px solid #ebebec;
        background-image: url(menu.jpg);
		top: -450px;
        
        -webkit-transition: all 0.5s 0s ease;
          -moz-transition: all 0.5s 0s ease;
          -ms-transition: all 0.5s 0s ease;
          -o-transition: all 0.5s 0s ease;
          transition: all 0.5s 0s ease;
	}
    .fixed #main > div {
        top: 0;
    }
	
</style>
</head>
<body>