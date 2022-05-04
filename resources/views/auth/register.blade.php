@extends('layouts.master')

@section('title','web-Todo Sign Up')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/formStyles.css')}}" />
@endsection

@section('content')
    <body class="signUpFormBody">
    <div></div>
    <div>
        <div></div>
        <div class="formBlock">
            <div class="formBlockLeft formBlockLeftBG">
                <table>
                    <tr>
                        <td><span id="leftHighlightedText">Already have account?</span></td>
                    </tr>
                    <tr>
                        <td class="center-content">
                            <a href="{{route('login')}}" class="bn3637 bn37 redirectButtonShader">Sign In</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="formBlockRight formBlockRightBG">
                <form action="" method="post">
                    @csrf
                    <table>
                        @if($errors->any())
                            <tr class="errorsRow">
                                <td>
                                    {{$errors->first('email')}}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="font-rightPart textShadow">EMail</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" id="email" name="email">
                                <hr class="bar">
                            </td>
                        </tr>
                        <tr>
                            <td class="font-rightPart textShadow">Create nickname</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="name" name="name">
                                <hr class="bar">
                            </td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td class="font-rightPart textShadow">Password</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" id="password" name="password">
                                <hr class="bar">
                            </td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td class="font-rightPart textShadow">Repeat password</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" id="password_repeat" name="password_repeat">
                                <hr class="bar">
                            </td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td class="center-content">
                                <input class="bn3637 bn37 submitButtonShader" type="submit" value="Sign Up">
                            </td>
                        </tr>
                        <tr class="noneIfWindowBig">
                            <td class="center-content">
                                <a href="{{route('login')}}">I have account already.</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
        <div></div>
    </div>
    <div></div>
@endsection
