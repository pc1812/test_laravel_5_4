function newpost() {
	newreply(0, 0);
}

function newreply(thread, replyee) {
	var form = document.getElementById('postForm');
	if(form.content.value.length == 0){
		alert('please write something');
		document.getElementById('postContentEditor').focus();
		return;
	}
	form.thread.value = thread;
	form.replyee.value = replyee;
	form.submit();
}
