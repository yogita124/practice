<?php
    //array of student details
    $details =  array( 
                array('sid' => '101', 'name' => 'Yogita', 'dob' => strtotime('02-01-1999'), 'class' =>'12', 'passed' => '0','marks'=>array('P'=>'56','C  '=>'12','M'=>'50') ),
                array('sid' => '102', 'name' => 'Zubin', 'dob' => strtotime('05-03-1998'), 'class' =>'10', 'passed' => '0','marks'=>array('SS'=>'30','S'=>'14','E'=>'03')),
                array('sid' => '103', 'name' => 'Yash', 'dob' => strtotime('27-11-1998'), 'class' =>'11', 'passed' => '0','marks'=>array('E'=>'30','B'=>'29','M'=>'35'))
                );
    //array of subjects
    $subject =  array(
                12 => array(array('name' => 'Physics', 'code' => P, 'mm' => 25),
                array('name' => 'Chemistry', 'code' => C, 'mm' => 30),
                array('name' => 'Mathematics', 'code' => M, 'mm' => 33)),
                11 => array(array('name' => 'Econmics', 'code' => E, 'mm' => 33),
                array('name' => 'Business', 'code' => B, 'mm' => 35),
                array('name' => 'Mathematics', 'code' => M, 'mm' => 40)),
                10 => array(array('name' => 'Social Science', 'code' =>SS, 'mm' => 40),
                array('name' => 'Sanskrit', 'code' => S, 'mm' => 40),
                array('name' => 'English', 'code' => E, 'mm' => 40))
                 );
    //array of obtained marks
    $marks = array(
            array('id' => '101', 'code' => 'P', 'ob' => '56'),
            array('id' => '101', 'code' => 'C', 'ob' => '12'),
            array('id' => '101', 'code' => 'M', 'ob' => '50'),
            array('id' => '102', 'code' => 'P', 'ob' => '30'),
            array('id' => '102', 'code' => 'C', 'ob' => '14'),
            array('id' => '102', 'code' => 'M', 'ob' => '03'),
            array('id' => '103', 'code' => 'E', 'ob' => '30'),
            array('id' => '103', 'code' => 'B', 'ob' => '29'),
            array('id' => '103', 'code' => 'M', 'ob' => '35'),
            );
    //ANSWER --1 function for subject as per class
    function subj ($class, $subject) {         
        $show = $subject[$class];
        foreach ($show as $key => $value) 
        {
            echo "<tr><td>".$value['name']."</td><td>".$value['code']."</td><td>".$value['mm']."</td></tr>";
        }
    }
    echo "<br><table border=1><tr><th>SUBJECT NAME</th><th>SUBJECT CODE</th><th>MIN. MARKS</th></tr>";
    subj(12,$subject);
    subj(11,$subject);
    subj(10,$subject);
    echo "</table><br>";
    foreach ($details as $key=>$value) {
        $gra=$value['class'];
        $arr=$value['marks'];
        $count=0;
        foreach ($arr as $key1=>$val) {
            for($x=0;$x<4;$x++) {
                if($subject[$gra][$x]['code']==$key1) {
                    $details[$key]['mm'][$key1]=$subject[$gra][$x]['mm'];
                    if($subject[$gra][$x]['mm']<=$arr[$key1]) {
                        $count=$count+1;
                    }
                }
            }
        }
    //
        if($count>=2) {
            $details[$key]['res']="PASS";
        }
        else {
            $details[$key]['res']="FAIL";
        }
    }
    //ANSWER --2 function return marks of student
    function mark($marks) {
        echo '<table border = "1px"><tr><th>Student id</th><th>Subject Code</th><th>Marks Obtained</th></tr>';
            foreach ($marks as $mar) 
            {
                echo "<tr><td>" . $mar['id'] . "</td><td>".$mar['code']."</td><td>".$mar['ob']."</td></tr>";        
            }
        echo '</table>';
    }
    mark($marks);
    echo "<br>";
    // ANSWER --3
    function student($details, $marks, $subject) {   
        echo '<table border = "1px"><th>NAME</th><th>DOB</th><th>GRADE</th><th>SUBJECTS</th><th>RESULT</th>';
        foreach ($details as $key=>$value) {
            $arr=$value['marks'];
            $details[$key]['dob']=date('m/d/Y', $details[$key]['dob']);
            echo "<tr><td>" .$details[$key]['name']."</td><td>".$details[$key]['dob']."</td><td>".$details[$key]['class']."</td><td>";
                foreach ($arr as $key1=>$val) {
                    echo $key1."(".$details[$key]['marks'][$key1].",".$details[$key]['mm'][$key1].")"."<br>";
                }
            echo "</td><td>".$details[$key]['res']."</td></tr>";
        }
    }
    student ($details, $marks, $subject);
?>