<div class="col-12 inline_flex">
    <div class="recaptcha_input">
        <input type="text" name="recaptcha" class="form-control recaptcha_user_input" placeholder=" عدد صحیح را وارد کنید" required="required">
    </div>
    <div class="recaptcha_p">
        <p>
            = <input name="random_input_a" readonly="readonly" value="{{$a}}" id="random_input_a" placeholder="{{$a}}"> + <input name="random_input_b" value="{{$b}}" readonly="readonly"  id="random_input_b">
        </p>

    </div>
    <a href="javascript:void(0)" onclick="recaptcha(event)" class="recaptcha_button tooltip-top"  data-tippy-content="به روز رسانی">
        <i class="fa fa-refresh"></i>
    </a>
</div>
@error('recaptcha')
<p class="error_message">
    {{ $message }}
</p>
@enderror
