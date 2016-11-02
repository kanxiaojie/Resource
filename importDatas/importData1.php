<?php
header("Content-type: text/html;charset=utf-8");

$conn1 = mysql_connect("127.0.0.1", "root","yhy","springold");
mysql_select_db("springold", $conn1);
mysql_query("set names utf8");

$conn2 = mysql_connect("127.0.0.1", "root","yhy","springtest2");
mysql_select_db("springtest2", $conn2);
mysql_query("set names utf8");

//无user_id

//catalogs
$sql1_catalogs = "select * from catalogs";
$query1_catalogs = mysql_query($sql1_catalogs,$conn1);
while($row1_catalogs = mysql_fetch_array($query1_catalogs))
{

    if($row1_catalogs['id'] != 1)
    {
        //将老系统里的数据插入到新系统
        $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

        mysql_select_db("springtest2", $conn);
        mysql_query("set names utf8");
        $id = $row1_catalogs['id'];
        $parent_id = $row1_catalogs['parent_id'];
        $name = $row1_catalogs['name'];
        $created_at = $row1_catalogs['created_at'];
        $updated_at = $row1_catalogs['updated_at'];

        $sql_catalogs = "insert into catalogs (id,parent_id,name,created_at,updated_at)".
            "values('$id','$parent_id','$name','$created_at','$updated_at')";

        if(mysql_query($sql_catalogs))
        {
            echo "insert catalogs successfully!";
        }
        mysql_close($conn);
    }
}


//course_manages
$sql1_course_manages = "select * from course_manages";
$query1_course_manages = mysql_query($sql1_course_manages,$conn1);
while($row1_course_manages = mysql_fetch_array($query1_course_manages))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_course_manages['id'];
    $model_id = $row1_course_manages['model_id'];
    if($row1_course_manages['manage_id'] == 3 || $row1_course_manages['manage_id'] == 4)
    {
        $manage_id = 2;
    }else
    {
        $manage_id = $row1_course_manages['manage_id'];
    }
    $created_at = $row1_course_manages['created_at'];
    $updated_at = $row1_course_manages['updated_at'];

    $sql_course_manages = "insert into course_manages (id,model_id,manage_id,created_at,updated_at)".
        "values('$id','$model_id','$manage_id','$created_at','$updated_at')";

    if(mysql_query($sql_course_manages))
    {
        echo "insert course_manages successfully!";
    }
    mysql_close($conn);
}

//exam_combinations
$sql1_exam_combinations = "select * from exam_combinations";
$query1_exam_combinations = mysql_query($sql1_exam_combinations,$conn1);
while($row1_exam_combinations = mysql_fetch_array($query1_exam_combinations))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_exam_combinations['id'];
    $bank_id = $row1_exam_combinations['bank_id'];
    $exam_id = $row1_exam_combinations['exam_id'];
    $numbers = $row1_exam_combinations['numbers'];
    $weight = $row1_exam_combinations['weight'];
    $created_at = $row1_exam_combinations['created_at'];
    $updated_at = $row1_exam_combinations['updated_at'];

    $sql_exam_combinations = "insert into exam_combinations (id,bank_id,exam_id,numbers,weight,created_at,updated_at)".
        "values('$id','$bank_id','$exam_id','$numbers','$weight','$created_at','$updated_at')";

    if(mysql_query($sql_exam_combinations))
    {
        echo "insert exam_combinations successfully!";
    }
    mysql_close($conn);
}


//exam_distributions
$sql1_exam_distributions = "select * from exam_distributions";
$query1_exam_distributions = mysql_query($sql1_exam_distributions,$conn1);
while($row1_exam_distributions = mysql_fetch_array($query1_exam_distributions))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_exam_distributions['id'];
    $model_id = $row1_exam_distributions['model_id'];
    $model_type = $row1_exam_distributions['model_type'];
    $exam_id = $row1_exam_distributions['exam_id'];
    $created_at = $row1_exam_distributions['created_at'];
    $updated_at = $row1_exam_distributions['updated_at'];

    $sql_exam_distributions = "insert into exam_distributions (id,model_id,model_type,exam_id,created_at,updated_at)".
        "values('$id','$model_id','$model_type','$exam_id','$created_at','$updated_at')";

    if(mysql_query($sql_exam_distributions))
    {
        echo "insert exam_distributions successfully!";
    }
    mysql_close($conn);
}

//exam_manages
$sql1_exam_manages = "select * from exam_manages";
$query1_exam_manages = mysql_query($sql1_exam_manages,$conn1);
while($row1_exam_manages = mysql_fetch_array($query1_exam_manages))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_exam_manages['id'];
    $model_id = $row1_exam_manages['model_id'];
    $manage_id = $row1_exam_manages['manage_id'];
    $created_at = $row1_exam_manages['created_at'];
    $updated_at = $row1_exam_manages['updated_at'];

    $sql_exam_manages = "insert into exam_manages (id,model_id,manage_id,created_at,updated_at)".
        "values('$id','$model_id','$manage_id','$created_at','$updated_at')";

    if(mysql_query($sql_exam_manages))
    {
        echo "insert exam_manages successfully!";
    }
    mysql_close($conn);
}

//post_areas
$sql1_post_areas = "select * from post_areas";
$query1_post_areas = mysql_query($sql1_post_areas,$conn1);
while($row1_post_areas = mysql_fetch_array($query1_post_areas))
{
    if($row1_post_areas['id'] != 1)
    {
        //将老系统里的数据插入到新系统
        $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

        mysql_select_db("springtest2", $conn);
        mysql_query("set names utf8");
        $id = $row1_post_areas['id'];
        $created_at = $row1_post_areas['created_at'];
        $updated_at = $row1_post_areas['updated_at'];

        $sql_post_areas = "insert into post_areas (id,created_at,updated_at)".
            "values('$id','$created_at','$updated_at')";

        if(mysql_query($sql_post_areas))
        {
            echo "insert post_areas successfully!";
        }
        mysql_close($conn);
    }
}

//questions
$sql1_questions = "select * from questions";
$query1_questions = mysql_query($sql1_questions,$conn1);
while($row1_questions = mysql_fetch_array($query1_questions))
{
    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_questions['id'];
    $question_id = $row1_questions['question_id'];
    $title = $row1_questions['title'];
    $bank_id = $row1_questions['bank_id'];
    $type = $row1_questions['type'];
    $priority = $row1_questions['priority'];
    $created_at = $row1_questions['created_at'];
    $updated_at = $row1_questions['updated_at'];

    $sql_questions = "insert into questions (id,question_id,title,bank_id,type,priority,created_at,updated_at)".
        "values('$id','$question_id','$title','$bank_id','$type','$priority','$created_at','$updated_at')";

    if(mysql_query($sql_questions))
    {
        echo "insert questions successfully!";
    }
    mysql_close($conn);
}

//question_bank_manages
$sql1_question_bank_manages = "select * from question_bank_manages";
$query1_question_bank_manages = mysql_query($sql1_question_bank_manages,$conn1);
while($row1_question_bank_manages = mysql_fetch_array($query1_question_bank_manages))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_question_bank_manages['id'];
    $model_id = $row1_question_bank_manages['model_id'];
    $manage_id = $row1_question_bank_manages['manage_id'];
    $created_at = $row1_question_bank_manages['created_at'];
    $updated_at = $row1_question_bank_manages['updated_at'];

    $sql_question_bank_manages = "insert into question_bank_manages (id,model_id,manage_id,created_at,updated_at)".
        "values('$id','$model_id','$manage_id','$created_at','$updated_at')";

    if(mysql_query($sql_question_bank_manages))
    {
        echo "insert question_bank_manages successfully!";
    }
    mysql_close($conn);
}

//question_results
$sql1_question_results = "select * from question_results";
$query1_question_results = mysql_query($sql1_question_results,$conn1);
while($row1_question_results = mysql_fetch_array($query1_question_results))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_question_results['id'];
    $question_id = $row1_question_results['question_id'];
    $result_id = $row1_question_results['result_id'];
    $answer = $row1_question_results['answer'];
    $score = $row1_question_results['score'];
    $if_true = $row1_question_results['if_true'];
    $overed = $row1_question_results['overed'];
    $created_at = $row1_question_results['created_at'];
    $updated_at = $row1_question_results['updated_at'];

    $sql_question_results = "insert into question_results (id,question_id,result_id,answer,score,if_true,overed,created_at,updated_at)".
        "values('$id','$question_id','$result_id','$answer','$score','$if_true','$overed','$created_at','$updated_at')";

    if(mysql_query($sql_question_results))
    {
        echo "insert question_results successfully!";
    }
    mysql_close($conn);
}

//question_selects
$sql1_question_selects = "select * from question_selects";
$query1_question_selects = mysql_query($sql1_question_selects,$conn1);
while($row1_question_selects = mysql_fetch_array($query1_question_selects))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_question_selects['id'];
    $title = $row1_question_selects['title'];
    $if_true = $row1_question_selects['if_true'];
    $question_id = $row1_question_selects['question_id'];
    $created_at = $row1_question_selects['created_at'];
    $updated_at = $row1_question_selects['updated_at'];

    $sql_question_selects = "insert into question_selects (id,title,if_true,question_id,created_at,updated_at)".
        "values('$id','$title','$if_true','$question_id','$created_at','$updated_at')";

    if(mysql_query($sql_question_selects))
    {
        echo "insert question_selects successfully!";
    }
    mysql_close($conn);
}

//question_select_results
$sql1_question_select_results = "select * from question_select_results";
$query1_question_select_results = mysql_query($sql1_question_select_results,$conn1);
while($row1_question_select_results = mysql_fetch_array($query1_question_select_results))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_question_select_results['id'];
    $select_id = $row1_question_select_results['select_id'];
    $result_id = $row1_question_select_results['result_id'];
    $created_at = $row1_question_select_results['created_at'];
    $updated_at = $row1_question_select_results['updated_at'];

    $sql_question_select_results = "insert into question_select_results (id,select_id,result_id,created_at,updated_at)".
        "values('$id','$select_id','$result_id','$created_at','$updated_at')";

    if(mysql_query($sql_question_select_results))
    {
        echo "insert question_select_results successfully!";
    }
    mysql_close($conn);
}

//resource_areas
$sql1_resource_areas = "select * from resource_areas";
$query1_resource_areas = mysql_query($sql1_resource_areas,$conn1);
while($row1_resource_areas = mysql_fetch_array($query1_resource_areas))
{
    if($row1_resource_areas['id'] != 1)
    {
        //将老系统里的数据插入到新系统
        $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

        mysql_select_db("springtest2", $conn);
        mysql_query("set names utf8");
        $id = $row1_resource_areas['id'];
        $created_at = $row1_resource_areas['created_at'];
        $updated_at = $row1_resource_areas['updated_at'];

        $sql_resource_areas = "insert into resource_areas (id,created_at,updated_at)".
            "values('$id','$created_at','$updated_at')";

        if(mysql_query($sql_resource_areas))
        {
            echo "insert resource_areas successfully!";
        }
        mysql_close($conn);
    }
}

//resource_manages
$sql1_resource_manages = "select * from resource_manages";
$query1_resource_manages = mysql_query($sql1_resource_manages,$conn1);
while($row1_resource_manages = mysql_fetch_array($query1_resource_manages))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_resource_manages['id'];
    $model_id = $row1_resource_manages['model_id'];
    $manage_id = $row1_resource_manages['manage_id'];
    $created_at = $row1_resource_manages['created_at'];
    $updated_at = $row1_resource_manages['updated_at'];

    $sql_resource_manages = "insert into resource_manages (id,model_id,manage_id,created_at,updated_at)".
        "values('$id','$model_id','$manage_id','$created_at','$updated_at')";

    if(mysql_query($sql_resource_manages))
    {
        echo "insert resource_manages successfully!";
    }
    mysql_close($conn);
}

//send_limits
$sql1_send_limits = "select * from send_limits";
$query1_send_limits = mysql_query($sql1_send_limits,$conn1);
while($row1_send_limits = mysql_fetch_array($query1_send_limits))
{

    //将老系统里的数据插入到新系统
    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

    mysql_select_db("springtest2", $conn);
    mysql_query("set names utf8");
    $id = $row1_send_limits['id'];
    $course_id = $row1_send_limits['course_id'];
    $attribute1_list = $row1_send_limits['attribute1_list'];
    $attribute2_list = $row1_send_limits['attribute2_list'];
    $attribute3_list = $row1_send_limits['attribute3_list'];
    $attribute4_list = $row1_send_limits['attribute4_list'];
    $attribute5_list = $row1_send_limits['attribute5_list'];
    $created_at = $row1_send_limits['created_at'];
    $updated_at = $row1_send_limits['updated_at'];

    $sql_send_limits = "insert into send_limits (id,course_id,attribute1_list,attribute2_list,attribute3_list,attribute4_list,attribute5_list,created_at,updated_at)".
        "values('$id','$course_id','$attribute1_list','$attribute2_list','$attribute3_list','$attribute4_list','$attribute5_list','$created_at','$updated_at')";

    if(mysql_query($sql_send_limits))
    {
        echo "insert send_limits successfully!";
    }
    mysql_close($conn);
}


