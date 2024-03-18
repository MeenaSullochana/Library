<div class="footer">
@php
        $homefooter = DB::table('homefooter')->first();

        @endphp
    <div class="copyright">
        <p> Copyright © {{$homefooter->copyright}}  All rights reserved by Directorate of Public Libraries.</p>
    </div>
</div>
