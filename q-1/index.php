<?php
    //hardcoded arrays of array with student details
    $student_details =  array( 
                array('id' => '101', 'name' => 'Yogita', 'dob' => strtotime('19-12-1998'), 'class' => '12', 'passed' => '0', 'marks' => array('P' => '56', 'C ' => '12', 'M'=>'50') ),
                array('id' => '102', 'name' => 'Zubin', 'dob' => strtotime('02-08-1999'), 'class' => '10', 'passed' => '0', 'marks' => array('SS' => '30', 'S' => '14', 'E'=>'03')),
                array('id' => '103', 'name' => 'Yash', 'dob' => strtotime('24-03-2000'), 'class' => '11', 'passed' => '0', 'marks' => array('E' => '30', 'B' => '29', 'M'=>'35'))
                       );
    //array of subjects according to classes
    $subject_details =  array(
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
    //array containing marks obtained by students
    $marks = array(
            array('id' => '101', 'code' => 'P', 'obtained' => '56'),
            array('id' => '101', 'code' => 'C', 'obtained' => '12'),
            array('id' => '101', 'code' => 'M', 'obtained' => '50'),
            array('id' => '102', 'code' => 'P', 'obtained' => '30'),
            array('id' => '102', 'code' => 'C', 'obtained' => '14'),
            array('id' => '102', 'code' => 'M', 'obtained' => '03'),
            array('id' => '103', 'code' => 'E', 'obtained' => '30'),
            array('id' => '103', 'code' => 'B', 'obtained' => '29'),
            array('id' => '103', 'code' => 'M', 'obtained' => '35'),
            );
    //function for subject as per class
    function get_subject ($class, $subject_details) {         
        $show = $subject_details[$class];
        foreach ($show as $key => $value) {
            echo "<tr><td>" . $value['name'] . "</td><td>" . $value['code'] . "</td><td>" . $value['mm'] . "</td></tr>";
        }
    }
    echo "<br><table border=1>
          <tr>
          <th>SUBJECT NAME</th>
          <th>SUBJECT CODE</th>
          <th>MIN. MARKS</th>
          </tr>";
    //function call to get subject for grade 12
    get_subject(12, $subject_details);
    //function call to get subject for grade 11
    get_subject(11, $subject_details);
    //function call to get subject for grade 10
    get_subject(10, $subject_details);
    echo "</table><br>";
    foreach ($student_details as $key => $value) {
        $grade = $value['class'];
        $mark = $value['marks'];
        $count = 0;
        foreach ($mark as $key1=>$val) {
            for($x = 0; $x < 4; $x++) {
                if($subject_details[$grade][$x]['code'] == $key1) {
                    $student_details[$key]['mm'][$key1] = $subject_details[$grade][$x]['mm'];
                    if($subject_details[$grade][$x]['mm'] <= $mark[$key1]) {
                        $count = $count + 1;
                    }
                }
            }
        }
    //check whether pass or fail
        if($count >= 2) {
            $student_details[$key]['result'] = "PASS";
        }
        else {
            $student_details[$key]['result'] = "FAIL";
        }
    }
    //function return marks of student
    function get_mark($marks) {
        echo '<table border = "1px"><tr><th>Student id</th><th>Subject Code</th><th>Marks Obtained</th></tr>';
        foreach ($marks as $mark) 
        {
            echo "<tr><td>" . $mark['id'] . "</td><td>" . $mark['code'] . "</td><td>" . $mark['obtained'] . "</td></tr>";        
        }
        echo '</table>';
    }
    get_mark($marks);
    echo "<br>";
    //final output
    function student($student_details, $marks, $subject_details) {   
        echo '<table border = "1px">
              <th>NAME</th>
              <th>DOB</th>
              <th>GRADE</th>
              <th>SUBJECTS</th>
              <th>RESULT</th>';
        foreach ($student_details as $key => $value) {
            $arr =  $value['marks'];
            $student_details[$key]['dob'] = date('m/d/Y', $student_details[$key]['dob']);
            echo "<tr><td>" . $student_details[$key]['name'] . "</td><td>" . $student_details[$key]['dob'] . "</td><td>" . $student_details[$key]['class'] . "</td><td>";
            foreach ($arr as $code => $data) {
                echo $code . "(" . $student_details[$key]['marks'][$code] . "," . $student_details[$key]['mm'][$code] . ")" . "<br>";
            }
            echo "</td><td>" . $student_details[$key]['result'] . "</td></tr>";
        }
    }
    student ($student_details, $marks, $subject);
?>
