function disp_prompt(weekday, time)
  {
    var content = prompt("请输入修改内容","");
    if (content!=null)
    {
      var myform = document.createElement("form");
      myform.method = "post";
      myform.action = "schedule.php";
      myform.style.display = "none";
      var set_weekday = document.createElement("textarea");
      var set_time = document.createElement("textarea");
      var input_new_lesson = document.createElement("textarea");
      set_weekday.name = "weekday";
      set_weekday.value = weekday;
      set_time.name = "time";
      set_time.value = time;
      input_new_lesson.name = "new_lesson";
      input_new_lesson.value = content;
      myform.appendChild(set_weekday);
      myform.appendChild(set_time);
      myform.appendChild(input_new_lesson);
      document.body.appendChild(myform);
      myform.submit();
    }
    else{
      alert("输入内容为空!");
    }
    return myform;
  }
