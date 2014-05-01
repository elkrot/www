
<span id="hours">0</span>:<span id="minutes">0</span>:<span id="seconds">0</span>
<form method=post id = "test_form" action ="./?target=test&action=finish&id=<?php echo $id_get;?>">
<?php foreach ($testToUserHierarhy as $test)
{
echo "<h1>".$test["test_title"]."</h1>";
 shuffle(&$test["questions"]);
	foreach ($test["questions"] as $question_id =>$question)
	{
		echo "<h2>".$question["question_title"]."</h2>";
		echo "<ul>";
 shuffle(&$question["answers"]);
			foreach ($question["answers"] as $answer_id=>$answer)
			{
			$type = ($question["total_answer"]>2 && $question["right_answers"]>1)?"checkbox":"radio";
			
			echo "<li><input  type =".$type." name =\"".$question_id."[]\" value=\"".$answer_id."\">".$answer["answer_title"]."</li>";
			}
		echo "</ul>";
	}
}

?>

<input type="submit" value="Отправить">