<div class="pdpa-dialog" id="pdpa-dialog">
  <h1 class="pdpa-title">{{ trans('laravel-pdpa::texts.title') }}</h1>
  <p class="pdpa-message">{{ trans('laravel-pdpa::texts.message') }}</p>
  <button id="pdpa-accept-btn" class="pdpa-btn accept-btn">{{ trans('laravel-pdpa::texts.acceptButton') }}</button>
  <button id="pdpa-reject-btn" class="pdpa-btn reject-btn">{{ trans('laravel-pdpa::texts.rejectButton') }}</button>
</div>
<script>
  function init() {
    const dialog = document.getElementById('pdpa-dialog');
    const acceptBtn = document.getElementById('pdpa-accept-btn');
    const rejectBtn = document.getElementById('pdpa-reject-btn');

    const cookieName = '{{config("laravel-pdpa.cookie_name")}}';
    const expired = '{{config("laravel-pdpa.cookie_expired")}}'
    const domain = 'localhost';
    if (document.cookie.split(';').indexOf(`${cookieName}=1`) !== -1) {
      dialog.style.display = 'none';
    }
    acceptBtn.addEventListener('click', () => {
      const date = new Date();
      date.setTime(date.getTime() + (expired * 24 * 60 * 60 * 1000));
      document.cookie = `${cookieName}=1;expires=${date.toUTCString()};domain=${domain};path=/;{{ config("session.secure") ? ';secure' : null }}{{ config("session.same_site") ? ';samesite='.config("session.same_site") : null }}`
      dialog.style.display = 'none';
    })
    rejectBtn.addEventListener('click', () => dialog.style.display = 'none');
  }
  init();
</script>
