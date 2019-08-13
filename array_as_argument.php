<?php 
if(isset($_POST['submit']))
    {
	class math
	{
		public $arr2 = array();
		function maths($arr)
		{
			$arrlen = count($arr);

			//Multiplication
			//{
			$mult = 1;
			if($arrlen>1)
				foreach ($arr as $value)
					$mult*=$value;
			else
				$mult = $arr[0];
			$this->arr2['mult']=$mult;

			//}
			//Addition 
			//{
				$add = 0;
				if($arrlen>1)
					foreach ($arr as $value)
						$add+=$value;
				else
					$add = $arr[0];
				$this->arr2['add']=$add;
			//}
			//Subtraction 
			//{
				$sub = $arr[0];
				if($arrlen>1){
					for($i=1; $i<$arrlen; $i++) { 
						$sub-=$arr[$i];
					}
				}
				$this->arr2['sub']=$sub;
			//}
			//Division 
			//{
				$divid = $arr[0];
				if($arrlen>1){
					for($i=1; $i<$arrlen; $i++) { 
						if($arr[$i]>0)
							$divid/=$arr[$i];
						else
							$divid = "&#x221e;";
					}
				}
				$this->arr2['divid']=$divid;
			
			//}

			//Returning Math Array
			return $this->arr2;
		}
		
	}
	$m1 = new math();
	$str = $_POST['input'];
	//$arr = str_split($str);
	$arr = explode(",",$str);
	$cond = "true";
	foreach ($arr as $value) {
		$ascii = ord($value);
		if(!($ascii>=48 && $ascii<=57))
			$cond = "false";
	}
	if($cond == "true")
	{
		$result_arr = array();
		$result_arr = $m1->maths($arr);
		echo 'Mult : '.implode($arr, "*")." = ".$result_arr['mult'].'<br>';
		echo 'Addition : '.implode($arr, "+")." = ".$result_arr['add'].'<br>';
		echo 'Subtraction : '.implode($arr, "-")." = ".$result_arr['sub'].'<br>';
		echo 'Divid : '.implode($arr, "/")." = ".$result_arr['divid'].'<br>';
	}
	else
		echo "Enter Number Only";
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Class</title>
</head>
<body>

<form method="post">
	<input type="text" placeholder="Use commo to saprate" name="input">
	<input type="submit" value="GO" name="submit">
</form>
</body>
</html>