function Grade(id,lesson)
  {
    var content = prompt("请输入分数",0);
    var new_grade = Number(content);
//    alert(new_grade);
    if(new_grade==null){
      alert("未输入分数");
    }
    else if( new_grade>100 || new_grade < 0){
      alert("分数不合理，请重新输入");
    }
     else{
 //     alert("go on");
      var myform = document.createElement("form");
      myform.method = "post";
      myform.action = "grades.php";
      myform.style.display = "none";
      var row_id = document.createElement("textarea");
      var update_lesson = document.createElement("textarea");
      var update_grade = document.createElement("textarea");
      row_id.name = "id";
      row_id.value = id;
      update_lesson.name = "lesson";
      update_lesson.value = lesson;
      update_grade.name = "grade";
      update_grade.value = new_grade;
      myform.appendChild(update_lesson);
      myform.appendChild(update_grade);
      myform.appendChild(row_id);
      document.body.appendChild(myform);
      myform.submit();
    }
    
    return myform;
  }
