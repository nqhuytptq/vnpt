<?php
include('student.php');
include('teacher.php');
session_start();

Person::$total = count($_SESSION['students']) + count($_SESSION['teachers']);

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}
if (!isset($_SESSION['teachers'])) {
    $_SESSION['teachers'] = [];
}
if (!isset($total)) {
    $total = 0;
}
if (isset($_POST['submit'])) {
    $id   = $_POST['id'];
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $type = $_POST['type'];

    if ($type == 'teacher') {
        $teacher = new Teacher($id, $name, $age);
        $teacher->suaTen($name);
        $_SESSION['teachers'][] = $teacher;
    } else {
        $student = new Student($id, $name, $age);
        $student->suaTen($name);
        $_SESSION['students'][] = $student;
    }
}
if (isset($_POST['clearData'])) {
    session_destroy();
    $_SESSION['students'] = [];
    $_SESSION['teachers'] = [];
    Person::delete();
}
if (isset($_POST['showListTeacher'])) {
    echo "<h3>Danh sách giáo viên</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <td>ID</td>
            <td>Tên</td>
            <td>Tuổi</td>
        </tr>";
    foreach ($_SESSION['teachers'] as $t) {
        echo "<tr>";
        echo "<td>" . $t->getId() . "</td>";
        echo "<td>" . $t->getName() . "</td>";
        echo "<td>" . $t->getAge() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST['showListStudent'])) {
    echo "<h3>Danh sách sinh viên</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <td>ID</td>
            <td>Tên</td>
            <td>Tuổi</td>
        </tr>";
    foreach ($_SESSION['students'] as $s) {
        echo "<tr>";
        echo "<td>" . $s->getId() . "</td>";
        echo "<td>" . $s->getName() . "</td>";
        echo "<td>" . $s->getAge() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
