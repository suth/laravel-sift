<script type="text/javascript">
  var _user_id = '{{ (Auth::user()) ? Auth::user()->email : '' }}';
  var _session_id = '{{ session()->get('sift_session_id') }}';

  var _sift = window._sift = window._sift || [];
  _sift.push(['_setAccount', '{{ config('sift.javascript_key') }}']);
  _sift.push(['_setUserId', _user_id]);
  _sift.push(['_setSessionId', _session_id]);
  _sift.push(['_trackPageview']);

 (function() {
   function ls() {
     var e = document.createElement('script');
     var s = document.getElementsByTagName('script')[0];
     e.src = 'https://cdn.siftscience.com/s.js';
     s.parentNode.insertBefore(e, s);
   }
   if (window.attachEvent) {
     window.attachEvent('onload', ls);
   } else {
     window.addEventListener('load', ls, false);
   }
 })();
</script>
