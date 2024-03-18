<div class="footer">
@php
        $homefooter = DB::table('homefooter')->first();

        @endphp
    <div class="copyright">
        <p> Copyright © {{$homefooter->copyright}}   <a href="#">| Design by Gladindia</p>
    </div>
</div>
