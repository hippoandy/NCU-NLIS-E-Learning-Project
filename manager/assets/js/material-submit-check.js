// Used by material-Upload.php
function material_UploadCheck()
{
	//deckare submit form
	var submitForm = document.getElementById("materialForm");
	//declare input field value											
	var subject = document.getElementById("subjectInput").value;
	var chapter = document.getElementById("chapterInput").value;
	var title = document.getElementById("titleInput").value;
	var intro = document.getElementById("introInput").value;
	var descript = document.getElementById("descriptInput").value;
	var teacher = document.getElementById("teacherInput").value;
	var file = document.getElementById("fileInput").value;
	//set input err null
	var message = "";
	$("#modalMessage").text("");
	
	//declare boolean varify
	var varify = true;
	
	//Verify account
	if (subject == "") {
		message += "1.尚未輸入教材主題。<br>";
		varify =  false;
	}
	
	if (chapter == "") {
		message += "2.尚未輸入教材章節。<br>";
		varify =  false;
	}
	
	if (title == "") {
		message += "3.尚未輸入教材章節標題。<br>";
		varify =  false;
	}
	
	if (intro == "") {
		message += "4.尚未輸入教材簡介。<br>";
		varify =  false;
	}
	
	if (descript == "") {
		message += "5.尚未輸入教材敘述。<br>";
		varify =  false;
	}
	
	if (teacher == "") {
		message += "6.尚未輸入教材講師。<br>";
		varify =  false;
	}
	
	if (file == "") {
		message += "7.尚未選擇教材檔案。<br>";
		varify =  false;
	}
	
	//check whether submit or show error
	if ( varify == false)
	{
		$("#modalMessage").html( message );
		//open message dialogue
		$('#Modal').modal('show');
	}
	else submitForm.submit();
}
