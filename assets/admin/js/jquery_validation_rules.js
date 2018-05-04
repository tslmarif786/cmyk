$(function(){	
	//<!---validation for notEqualTo--->
	jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
		return this.optional(element) || value != $(param).val();
	 }, "Please specify a different value.");
	 
	
	//<!---validation for dropdown--->
	$.validator.addMethod('dd_selectone', function(value,element){
		if($(element).val()!='')
			 return true;
		else
			return false;
	}, 'Please select at least one.');
	//<!---validation for precedeZero--->
	$.validator.addMethod('precedeZero', function(value,element){
		var stdcode = $(element).val();
		if(stdcode.charAt(0)==0)
			 return true;
		else
			return false;
	}, 'Please enter std code preceding with 0.');
	
	//------------validation for alphabets only-------------
	$.validator.addMethod("alphabet", function(value, element) {
		return this.optional(element) || /^[a-zA-Z]*$/i.test(value);
	}, "Only alphabets are allowed.");
	//------------validation for alphabets and space only-------------
	$.validator.addMethod("alphabetSp", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s]*$/i.test(value);
	}, "Only alphabets and space are allowed.");
	//------------validation for alphabets and dot only-------------
	$.validator.addMethod("alphabetDot", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\.]*$/i.test(value);
	}, "Only alphabets and dot are allowed.");
	//------------validation for alphabets,space and dots only-------------
	$.validator.addMethod("parents", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\.\s]*$/i.test(value);
	}, "Only alphabets,space and dot.<br><span>are allowed.</span>");
	//------------validation for alphabets and digits (Alphanumeric) only-------------
	$.validator.addMethod("alphabetDigit", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
	}, "Alphabets and digits only.");
	//<!---validation for precedeZero--->
	 $.validator.addMethod('chk_parents_name', function(value,element){
		var parents_name = $(element).attr('id');
		if(parents_name == 'father_name')
		{
			if($.trim($(element).val())!='' || $.trim($('#mother_name').val())!='')
				return true;
			else
				return false;
		}
		else
		{
			if($.trim($(element).val())!='' || $.trim($('#father_name').val())!='')
				return true;
			else
				return false;
		}
	}, 'Please enter parents name.');
	//-----------Email for Parents/Candidate---------
	 $.validator.addMethod('chk_email', function(value,element){
		var emailId = $(element).attr('id');
		if(emailId == 'parents_email')
		{
			if($.trim($(element).val())!='' || $.trim($('#email_id').val())!='')
				return true;
			else
				return false;
		}
		else
		{
			if($.trim($(element).val())!='' || $.trim($('#parents_email').val())!='')
				return true;
			else
				return false;
		}
	}, 'At least one email id must be filled. <br><span>Both not compulsory.<span>');
	//-----------Mobile No for Parents/Candidate---------
	 $.validator.addMethod('chk_mobno', function(value,element){
		var mobileNo = $(element).attr('id');
		if(mobileNo == 'parents_mobno')
		{
			if($.trim($(element).val())!='' || $.trim($('#mobile_no').val())!='')
				return true;
			else
				return false;
		}
		else
		{
			if($.trim($(element).val())!='' || $.trim($('#parents_mobno').val())!='')
				return true;
			else
				return false;
		}
	}, 'At least one mobile no must be filled. <br><span>Both not compulsory.<span>');
	
	//------------validation for address---------------------
	$.validator.addMethod("adds", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9\s\/\-&\.\#\:\,]*$/i.test(value);
	}, "Only alphabets, /, -, &, ., # and : <br><span>are allowed.<span>");
	
	//------------textarea---------------------
	$.validator.addMethod("textareaValidate", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9\s\.\-]*$/i.test(value);
	}, "Only alphanumeric characters, dot, -<br><span>and space are allowed.<span>");
	
	$.validator.addMethod("roll_no",function(value,element){
		var regexp = /^[A-Za-z0-9\-\/]{3,50}$/i;
		return this.optional(element) || regexp.test(value);
	},"Only alphabets, digits, - and <br><span>/ are allowed.</span>");
	
	$.validator.addMethod("describe",function(value,element){
		var regexp = /^[A-Za-z\s\.\,\-\&\:\()]*$/i;
		return this.optional(element) || regexp.test(value);
	},"Only alphabets, dot, -, &, :, , and () are allowed.");
	
	$.validator.addMethod("board",function(value,element){
		var regexp = /^[A-Za-z\s\.\,\-&\:\()]*$/i;
		return this.optional(element) || regexp.test(value);
	},"Only alphabets and characters like . - <br><span>: & and () are allowed.</span>");
	
});