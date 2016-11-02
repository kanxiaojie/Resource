<?php
header("Content-type: text/html;charset=utf-8");

$conn1 = mysql_connect("127.0.0.1", "root","yhy","springold");
mysql_select_db("springold", $conn1);
mysql_query("set names utf8");

$conn2 = mysql_connect("127.0.0.1", "root","yhy","springtest2");
mysql_select_db("springtest2", $conn2);
mysql_query("set names utf8");

$sql1 = "select * from users";
$query1 = mysql_query($sql1,$conn1); //添加连接$conn1
$array1 = array();
while($row1 = mysql_fetch_array($query1))
{
    $array1['id'] = $row1['id'];//老系统
    $array1['name'] = $row1['name'];

    $sql2 = "select * from users";
    $array2 = array();
    $query2 = mysql_query($sql2, $conn2);
    while($row2 = mysql_fetch_array($query2))
    {
        $array2['id'] = $row2['id'];//新系统 users表 id
        $array2['name'] = $row2['name'];//新系统 users表 工号

        //判断新系统是否存在某个人，若有，执行下面操作
        if($array1['name'] == $array2['name'])
        {
            //resources
            $sql1_resources = "select * from resources";
            $array1_resources = array();
            $query1_resources = mysql_query($sql1_resources,$conn1);
            while($row1_resources = mysql_fetch_array($query1_resources))
            {

                if($row1_resources['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_resources['id'];
                    $name = $row1_resources['name'];
                    $filename = $row1_resources['filename'];
                    $storagename = $row1_resources['storagename'];
                    $catalog_id = $row1_resources['catalog_id'];
                    $user_id = $array2['id'];
                    $size = $row1_resources['size'];
                    $type = $row1_resources['type'];
                    $area_id = $row1_resources['area_id'];
                    $created_at = $row1_resources['created_at'];
                    $updated_at = $row1_resources['updated_at'];

                    $sql_resources = "insert into resources (id,name,filename,storagename, catalog_id,user_id,size,type,area_id,created_at,updated_at)".
                        "values('$id','$name','$filename','$storagename','$catalog_id','$user_id','$size','$type','$area_id','$created_at','$updated_at')";

                    if(mysql_query($sql_resources))
                    {
                        echo "insert resources successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //exam_results
            $sql1_exam_results = "select * from exam_results";
            $array1_exam_results = array();
            $query1_exam_results = mysql_query($sql1_exam_results,$conn1);
            while($row1_exam_results = mysql_fetch_array($query1_exam_results))
            {
                if($row1_exam_results['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_exam_results['id'];
                    $score = $row1_exam_results['score'];
                    $overed = $row1_exam_results['overed'];
                    $passed = $row1_exam_results['passed'];
                    $user_id = $array2['id'];
                    $record_id = $row1_exam_results['record_id'];
                    $created_at = $row1_exam_results['created_at'];
                    $updated_at = $row1_exam_results['updated_at'];

                    $sql_exam_results = "insert into exam_results (id,score,overed,passed, user_id,record_id,created_at,updated_at)".
                        "values('$id','$score','$overed','$passed','$user_id','$record_id','$created_at','$updated_at')";

                    if(mysql_query($sql_exam_results))
                    {
                        echo "insert exam_results successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //login_records
            $sql1_login_records = "select * from login_records";
            $array1_login_records = array();
            $query1_login_records = mysql_query($sql1_login_records,$conn1);
            while($row1_login_records = mysql_fetch_array($query1_login_records))
            {
                if($row1_login_records['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_login_records['id'];
                    $status = $row1_login_records['status'];
                    $note = $row1_login_records['note'];
                    $user_id = $array2['id'];
                    $message_id = $row1_login_records['message_id'];
                    $created_at = $row1_login_records['created_at'];
                    $updated_at = $row1_login_records['updated_at'];

                    $sql_login_records = "insert into login_records (id,status,note, user_id,message_id,created_at,updated_at)".
                        "values('$id','$status','$note','$user_id','$message_id','$created_at','$updated_at')";

                    if(mysql_query($sql_login_records))
                    {
                        echo "insert login_records successfully!";
                    }
                    mysql_close($conn);
                }
            }


            //course_records
            $sql1_course_records = "select * from course_records";
            $array1_course_records = array();
            $query1_course_records = mysql_query($sql1_course_records,$conn1);
            while($row1_course_records = mysql_fetch_array($query1_course_records))
            {
                if($row1_course_records['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_course_records['id'];
                    $course_id = $row1_course_records['course_id'];
                    $user_id = $array2['id'];
                    $process = $row1_course_records['process'];
                    $overdue = $row1_course_records['overdue'];
                    $study_times = $row1_course_records['study_times'];
                    $study_span = $row1_course_records['study_span'];
                    $started_at = $row1_course_records['started_at'];
                    $end_at = $row1_course_records['end_at'];
                    $max_score = $row1_course_records['max_score'];
                    $exam_max_score = $row1_course_records['exam_max_score'];
                    $star = $row1_course_records['star'];
                    $created_at = $row1_course_records['created_at'];
                    $updated_at = $row1_course_records['updated_at'];

                    $sql_course_records = "insert into course_records (id, course_id,user_id,process,overdue,study_times,study_span,started_at,end_at,max_score,exam_max_score,star,created_at,updated_at)".
                        "values('$id','$course_id','$user_id','$process','$overdue','$study_times','$study_span','$started_at','$end_at','$max_score','$exam_max_score','$star','$created_at','$updated_at')";

                    if(mysql_query($sql_course_records))
                    {
                        echo "insert course_records successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //login_messages
            $sql1_login_messages = "select * from login_messages";
            $array1_login_messages = array();
            $query1_login_messages = mysql_query($sql1_login_messages,$conn1);
            while($row1_login_messages = mysql_fetch_array($query1_login_messages))
            {
                if($row1_login_messages['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_login_messages['id'];
                    $user_id = $array2['id'];
                    $login_times = $row1_login_messages['login_times'];
                    $created_at = $row1_login_messages['created_at'];
                    $updated_at = $row1_login_messages['updated_at'];

                    $sql_login_messages = "insert into login_messages (id, user_id,login_times,created_at,updated_at)".
                        "values('$id','$user_id','$login_times','$created_at','$updated_at')";

                    if(mysql_query($sql_login_messages))
                    {
                        echo "insert login_messages successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //course_spans
            $sql1_course_spans = "select * from course_spans";
            $array1_course_spans = array();
            $query1_course_spans = mysql_query($sql1_course_spans,$conn1);
            while($row1_course_spans = mysql_fetch_array($query1_course_spans))
            {
                if($row1_course_spans['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_course_spans['id'];
                    $user_id = $array2['id'];
                    $course_id = $row1_course_spans['course_id'];
                    $study_span = $row1_course_spans['study_span'];
                    $created_at = $row1_course_spans['created_at'];
                    $updated_at = $row1_course_spans['updated_at'];

                    $sql_course_spans = "insert into course_spans (id, user_id,course_id,study_span,created_at,updated_at)".
                        "values('$id','$user_id','$course_id','$study_span','$created_at','$updated_at')";

                    if(mysql_query($sql_course_spans))
                    {
                        echo "insert course_spans successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //ranks
            $sql1_ranks = "select * from ranks";
            $array1_ranks = array();
            $query1_ranks = mysql_query($sql1_ranks,$conn1);
            while($row1_ranks = mysql_fetch_array($query1_ranks))
            {
                if($row1_ranks['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_ranks['id'];
                    $user_id = $array2['id'];
                    $study_span = $row1_ranks['study_span'];
                    $created_at = $row1_ranks['created_at'];
                    $updated_at = $row1_ranks['updated_at'];

                    $sql_ranks = "insert into ranks (id, user_id,study_span,created_at,updated_at)".
                        "values('$id','$user_id','$study_span','$created_at','$updated_at')";

                    if(mysql_query($sql_ranks))
                    {
                        echo "insert ranks successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //records
            $sql1_records = "select * from records";
            $array1_records = array();
            $query1_records = mysql_query($sql1_records,$conn1);
            while($row1_records = mysql_fetch_array($query1_records))
            {
                if($row1_records['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_records['id'];
                    $type = $row1_records['type'];
                    $user_id = $array2['id'];
                    $model_id = $row1_records['model_id'];
                    $model_type = $row1_records['model_type'];
                    $created_at = $row1_records['created_at'];
                    $updated_at = $row1_records['updated_at'];

                    $sql_records = "insert into records (id, type, user_id,model_id,model_type,created_at,updated_at)".
                        "values('$id','$type','$user_id','$model_id','$model_type','$created_at','$updated_at')";

                    if(mysql_query($sql_records))
                    {
                        echo "insert records successfully!";
                    }
                    mysql_close($conn);
                }
            }


            //exams
            $sql1_exams = "select * from exams";
            $array1_exams = array();
            $query1_exams = mysql_query($sql1_exams,$conn1);
            while($row1_exams = mysql_fetch_array($query1_exams))
            {
                if($row1_exams['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_exams['id'];
                    $exam_id = $row1_exams['exam_id'];
                    $title = $row1_exams['title'];
                    $description = $row1_exams['description'];
                    $pass_score = $row1_exams['pass_score'];
                    $exam_time = $row1_exams['exam_time'];
                    $limit_times = $row1_exams['limit_times'];
                    $limit_days = $row1_exams['limit_days'];
                    $catalog_id = $row1_exams['catalog_id'];
                    $user_id = $array2['id'];
                    $if_link = $row1_exams['if_link'];
                    $emailed = $row1_exams['emailed'];
                    $created_at = $row1_exams['created_at'];
                    $updated_at = $row1_exams['updated_at'];

                    $sql_exams = "insert into exams (id, exam_id,title,description,pass_score,exam_time,limit_times,limit_days,catalog_id,user_id,if_link,emailed,created_at,updated_at)".
                        "values('$id','$exam_id','$title','$description','$pass_score','$exam_time','$limit_times','$limit_days','$catalog_id','$user_id','$if_link','$emailed','$created_at','$updated_at')";

                    if(mysql_query($sql_exams))
                    {
                        echo "insert exams successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //course_wares
            $sql1_course_wares = "select * from course_wares";
            $array1_course_wares = array();
            $query1_course_wares = mysql_query($sql1_course_wares,$conn1);
            while($row1_course_wares = mysql_fetch_array($query1_course_wares))
            {
                if($row1_course_wares['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_course_wares['id'];
                    $course_id = $row1_course_wares['course_id'];
                    $user_id = $array2['id'];
                    $filename = $row1_course_wares['filename'];
                    $path = $row1_course_wares['path'];
                    $storagename = $row1_course_wares['storagename'];
                    $created_at = $row1_course_wares['created_at'];
                    $updated_at = $row1_course_wares['updated_at'];

                    $sql_course_wares = "insert into course_wares (id, course_id, user_id,filename,path,storagename,created_at,updated_at)".
                        "values('$id','$course_id','$user_id','$filename','$path','$storagename','$created_at','$updated_at')";

                    if(mysql_query($sql_course_wares))
                    {
                        echo "insert course_wares successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //study_logs
            $sql1_study_logs = "select * from study_logs";
            $array1_study_logs = array();
            $query1_study_logs = mysql_query($sql1_study_logs,$conn1);
            while($row1_study_logs = mysql_fetch_array($query1_study_logs))
            {
                if($row1_study_logs['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_study_logs['id'];
                    $course_id = $row1_study_logs['course_id'];
                    $user_id = $array2['id'];
                    $suspend_data = $row1_study_logs['suspend_data'];
                    $location = $row1_study_logs['location'];
                    $mode = $row1_study_logs['mode'];
                    $completion_status = $row1_study_logs['completion_status'];
                    $created_at = $row1_study_logs['created_at'];
                    $updated_at = $row1_study_logs['updated_at'];

                    $sql_study_logs = "insert into study_logs (id, course_id, user_id, suspend_data,location,mode,completion_status,created_at,updated_at)".
                        "values('$id','$course_id','$user_id','$suspend_data','$location','$mode','$completion_status','$created_at','$updated_at')";

                    if(mysql_query($sql_study_logs))
                    {
                        echo "insert study_logs successfully!";
                    }
                    mysql_close($conn);
                }
            }


            //courses
            $sql1_courses = "select * from courses";
            $array1_courses = array();
            $query1_courses = mysql_query($sql1_courses,$conn1);
            while($row1_courses = mysql_fetch_array($query1_courses))
            {
                if($row1_courses['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_courses['id'];
                    $course_id = $row1_courses['course_id'];
                    $title = $row1_courses['title'];
                    $language_id = $row1_courses['language_id'];
                    $catalog_id = $row1_courses['catalog_id'];
                    $user_id = $array2['id'];
                    $area_id = $row1_courses['area_id'];
                    $hours = $row1_courses['hours'];
                    $minutes = $row1_courses['minutes'];
                    $limitdays = $row1_courses['limitdays'];
                    $target = $row1_courses['target'];
                    $description = $row1_courses['description'];
                    $ware_id = $row1_courses['ware_id'];
                    $emailed = $row1_courses['emailed'];
                    $if_send_new_user = $row1_courses['if_send_new_user'];
                    $if_order = $row1_courses['if_order'];
                    $if_open_overdue = $row1_courses['if_open_overdue'];
                    $resource_id = $row1_courses['resource_id'];
                    $type = $row1_courses['type'];
                    $pushed = $row1_courses['pushed'];
                    $public = $row1_courses['public'];
                    $created_at = $row1_courses['created_at'];
                    $updated_at = $row1_courses['updated_at'];

                    $sql_courses = "insert into courses (id, course_id, title, language_id,catalog_id,user_id,area_id,hours,minutes,limitdays,target,description,ware_id,emailed,if_send_new_user,if_order,if_open_overdue,resource_id,type,pushed,public,created_at,updated_at)".
                        "values('$id','$course_id','$title','$language_id','$catalog_id','$user_id','$area_id','$hours','$minutes','$limitdays','$target','$description','$ware_id','$emailed','$if_send_new_user','$if_order','$if_open_overdue','$resource_id','$type','$pushed','$public','$created_at','$updated_at')";

                    if(mysql_query($sql_courses))
                    {
                        echo "insert courses successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //import_logs
            $sql1_import_logs = "select * from import_logs";
            $array1_import_logs = array();
            $query1_import_logs = mysql_query($sql1_import_logs,$conn1);
            while($row1_import_logs = mysql_fetch_array($query1_import_logs))
            {
                if($row1_import_logs['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_import_logs['id'];
                    $filename = $row1_import_logs['filename'];
                    $storagename = $row1_import_logs['storagename'];
                    $type = $row1_import_logs['type'];
                    $error = $row1_import_logs['error'];
                    $user_id = $array2['id'];
                    $created_at = $row1_import_logs['created_at'];
                    $updated_at = $row1_import_logs['updated_at'];

                    $sql_import_logs = "insert into import_logs (id, filename, storagename, type,error,user_id,created_at,updated_at)".
                        "values('$id','$filename','$storagename','$type','$error','$user_id','$created_at','$updated_at')";

                    if(mysql_query($sql_import_logs))
                    {
                        echo "insert import_logs successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //question_banks
            $sql1_question_banks = "select * from question_banks";
            $array1_question_banks = array();
            $query1_question_banks = mysql_query($sql1_question_banks,$conn1);
            while($row1_question_banks = mysql_fetch_array($query1_question_banks))
            {
                if($row1_question_banks['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");

                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_question_banks['id'];
                    $title = $row1_question_banks['title'];
                    $user_id = $array2['id'];
                    $owner_id = $row1_question_banks['owner_id'];
                    $created_at = $row1_question_banks['created_at'];
                    $updated_at = $row1_question_banks['updated_at'];

                    $sql_question_banks = "insert into question_banks (id, title, user_id,owner_id,created_at,updated_at)".
                        "values('$id','$title','$user_id','$owner_id','$created_at','$updated_at')";

                    if(mysql_query($sql_question_banks))
                    {
                        echo "insert question_banks successfully!";
                    }
                    mysql_close($conn);
                }
            }

            //exam_records表
            $sql1_exam_records = "select * from exam_records";
            $array1_exam_records = array();
            $query1_exam_records = mysql_query($sql1_exam_records,$conn1);
            while($row1_exam_records = mysql_fetch_array($query1_exam_records))
            {
                if($row1_exam_records['user_id'] == $array1['id'])
                {
                    //将老系统里的数据插入到新系统
                    $conn = mysql_connect("127.0.0.1", "root","yhy","springtest2");
                    mysql_select_db("springtest2", $conn);
                    mysql_query("set names utf8");
                    $id = $row1_exam_records['id'];
                    $distribution_id = $row1_exam_records['distribution_id'];
                    $user_id = $array2['id'];
                    $end_at = $row1_exam_records['end_at'];
                    $process = $row1_exam_records['process'];
                    $max_score = $row1_exam_records['max_score'];
                    $created_at = $row1_exam_records['created_at'];
                    $updated_at = $row1_exam_records['updated_at'];

                    $sql_exam_records = "insert into exam_records (id, distribution_id, user_id,end_at,process,max_score,created_at,updated_at)".
                        "values('$id','$distribution_id','$user_id','$end_at','$process','$max_score','$created_at','$updated_at')";

                    if(mysql_query($sql_exam_records))
                    {
                        echo "insert exam_records successfully!";
                    }
                    mysql_close($conn);
                }
            }
        }
    }

}

