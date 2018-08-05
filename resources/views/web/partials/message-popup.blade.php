<style type="text/css">
	

</style>
<div class="modal fade" id="message_popup" role="dialog">
	
	<div class="modal-dialog" style="padding: 40px 10px;background-color: white">
		<label style="color: #666;font-size: 22px">New Message</label>			
		<div class="reply_message" id="reply_message_popup">
			<form>
			<input type="hidden" name="user_id" value="{{ $user->id or '' }}" >
			<input type="hidden" name="is_popup_message_form" value="1" >

            <textarea class="write_messagereply" placeholder="Write a message ..." rows="4" name="message"></textarea>
            <div class="reply">
                <button type="button" onclick="Message.sendMessage($(this), event)" class="btn_posts btn_rply">Send <i class="fa fa-arrow-right"></i></button>
            </div>
            </form>
        </div>
	</div>

</div>