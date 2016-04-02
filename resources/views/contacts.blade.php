@extends('layouts.app')
@section('section')
@endsection
@section('content')
    <form action="sendInvitationEmail" method="get">
    <div style="margin-left: auto; margin-right: auto; width:50%; height: 700px; overflow-x: hidden; overflow-y: scroll;">
        <table class="table table-hover" style="width: 100%;">
            <thead>
                <td >
                    <input type="checkbox" name="contactHeaderCheckBox">
                </td>
                <td >
                    <label for="">Addresses</label>
                </td>
            </thead>
                @foreach($emails as $email)
                    <tr>
                        <td>
                            <input type="checkbox" name="checked[]" value="{{$email}}">

                        </td>
                        <td>{{ $email  }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
        <div style="width: 50%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            <input type="submit" value="Invite Selected Friend(s)">
        </div>

    </form>
@endsection
