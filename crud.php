<?php
include ('config.php');

//USERS
function createUser($sql_connect,$firstname,$lastname,$phone,$email,$password,$society,$city,$admin){
    $sql_connect->query("INSERT INTO users VALUES ('','$firstname','$lastname','$phone','$email','$password','$society','$city','$admin','')");
}

function getAllUsers($sql_connect){
    $result = $sql_connect->query("SELECT * FROM users");
    return $result;
}

function getUserById($sql_connect,$id_user){
    $result = $sql_connect->query("SELECT * FROM users WHERE id = $id_user");
    return $result;
}

function updateUser($sql_connect,$id_user,$firstname,$lastname,$phone,$email,$password,$society,$city,$admin){
    $result = $sql_connect->query("");
    return $result;
}

function deleteUser($sql_connect,$id_user){
    $sql_connect->query("DELETE FROM users WHERE id = $id_user");
}

//FORMS
function createForm($sql_connect,$title){
    $sql_connect->query("INSERT INTO forms VALUES ('','$title')");
}

function getAllForms($sql_connect){
    $result = $sql_connect->query("SELECT * FROM forms");
    return $result;
}

function getFormById($sql_connect,$id_form){
    $result = $sql_connect->query("SELECT * FROM forms WHERE id = $id_form");
    return $result;
}

function updateForm($sql_connect,$id_form,$new_content){
    $sql_connect->query("UPDATE forms SET content = $new_content WHERE id = $id_form");
}

function deleteForm($sql_connect,$id_form){
    $sql_connect->query("DELETE FROM forms WHERE id = $id_form");

}

//STEPS
function createStep($sql_connect,$id_form,$title){
    $sql_connect->query("INSERT INTO steps VALUES ('','$id_form','$title')");
}

function getAllSteps($sql_connect){
    $result = $sql_connect->query("SELECT * FROM steps");
    return $result;
}

function getStepsByFormId($sql_connect,$id_form){
    $result = $sql_connect->query("SELECT * FROM steps WHERE id_form = $id_form");
    return $result;
}

function updateStep($sql_connect,$id_form,$new_content){
    $sql_connect->query("UPDATE steps SET content = $new_content WHERE id = $id_form");
}

function deleteStep($sql_connect,$id_step){
    $sql_connect->query("DELETE FROM steps WHERE id = $id_step");
}


//QUESTIONS
function createQuestion($sql_connect,$id_step,$content){
    $sql_connect->query("INSERT INTO questions VALUES ('','$id_step','$content')");
}

function getAllQuestions($sql_connect){
    $result = $sql_connect->query("SELECT * FROM questions");
    return $result;
}

function getQuestionsByStepId($sql_connect,$id_step){
    $result = $sql_connect->query("SELECT * FROM questions WHERE id_step = $id_step");
    return $result;
}

function updateQuestion($sql_connect,$id,$new_content){
    $sql_connect->query("UPDATE questions SET content = $new_content WHERE id = $id ");
}

function deleteQuestion($sql_connect,$id){
    $sql_connect->query("DELETE FROM questions WHERE id = $id");
}
