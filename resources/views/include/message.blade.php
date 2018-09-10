<div class="msg">
    <div class="add_hide alert alert1 alert-danger alert-dismissable">
        <span class="mysmg">សូមបញ្ជូលព័ត៌មានចាំបាច់.</span>
    </div>
</div>


@if(!empty($errors->first()))
    <div class="msg">
        <div class="add_hide1 alert-danger alert-dismissable">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif

@if(session()->has('success'))
    <div class="msg">
        <div class="add_hide1  alert-success alert-dismissable">
            {{ session()->get('success') }}
        </div>
    </div>
@endif

@if(session()->has('danger'))
    <div class="msg">
        <div class="add_hide1  alert-danger alert-dismissable">
            {{ session()->get('danger') }}
        </div>
    </div>
@endif