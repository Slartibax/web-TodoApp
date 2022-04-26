@extends('layouts.master')

@section('title','web-Todo Login')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/formStyles.css')}}" />
@endsection

@section('content')
    <div class="signInFormBody">
        <div></div>
        <div>
            <div></div>
            <div class="formBlock">
                <div class="formBlockLeft formBlockLeftBG">
                    <table>
                        <tr>
                            <td><span id="leftHighlightedText">Don't have account yet?</span></td>
                        </tr>
                        <tr>
                            <td class="center-content">
                                <a href="{{route('signUp.show')}}" class="bn3637 bn37 redirectButtonShader">Sign Up</a>
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
                                <td class="font-rightPart textShadow">Email</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="email" id="email" name="email">
                                    <hr class="bar">
                                </td>
                            </tr>
                            <tr style="height: 15px"></tr>
                            <tr>
                                <td class="font-rightPart textShadow">Password</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" id="password" name="password">
                                    <hr class="bar">
                                </td>
                            </tr>
                            <tr style="height: 15px"></tr>
                            <tr>
                                <td>
                                    <label>
                                        <input class="cbx" type="checkbox" name="remember_me" id="remember_me"> Remember
                                        me
                                    </label>
                                </td>
                            </tr>
                            <tr style="height: 20px"></tr>
                            <tr>
                                <td class="center-content"><input class="bn3637 bn37 submitButtonShader" type="submit"
                                                                  value="Sign In"></td>
                            </tr>
                            <tr style="height: 15px"></tr>
                            <tr class="noneIfWindowBig">
                                <td class="center-content">
                                    <a href="{{route('signUp.show')}}">Create account.</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div></div>
        </div>
        <div></div>
    </div>
@endsection
