@extends('layouts.master')
@section('title','web-Todo')
@section('styles')
    <style>
        .weekDay a {
            display: flex;
            height:  4em;
            width: 4em;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            border-radius: 0.6rem;
            border: 2px black solid;
            margin: 2px;
        }

        .calendar {
            overflow: clip;
            display: flex;
            flex-direction: row;
            border-radius: 0.6rem;
            margin: 1em;
            max-width: 500px;
            justify-content: space-around;
            background-color: inherit;
        }

        .Day {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            border-radius: 0.2rem;
            margin: 1em;
        }

        .dayListBlock {
            display: flex;
            flex-direction: column;
            border-radius: 0.2rem;
            margin-right: 5px;
            margin-left: 5px;
            min-height: 10px;
        }

        .dayAddButtonBlock {
            width: 100%;
            height: 27px;
            border-radius: 0.3rem 0.3rem 0.7rem 0.7rem;
            margin: 4px;
        }

        .dayDateBlock {
            padding: 5px;
            height: 20px;
            width: fit-content;
            font-size: 13px;
            margin: 8px 8px 8px 24px;
            border-radius: 0.5rem;
        }

        .headerBlock {
            display: flex;
            flex-direction: row;
            padding: 4px;
        }

        .headerIcon {
            margin:  10px;
        }

        .headerTitle {
            margin-right: 10px;
            margin-left: 10px;
        }

        .headerButton {
            margin: 10px;
            width: 37px ;
            height: 37px;
        }

        .headerEdit {
            width: 37px ;
            height: 37px ;
        }

        .headerInvite {
            width: 37px ;
            height: 37px ;
        }

        .icon{
            background-repeat: no-repeat;
            background-position: center;
            background-size: 27px;
        }

        .iconSchedule {
            background-image: url(icons/schedule.svg);
            height: 35px;
            width: 35px;
        }

        .iconMore {
            background-image: url(icons/more.svg);
            background-size: 27px;
            height: 35px;
            width: 35px;
        }

        .iconEdit {
            background-image: url(icons/edit.svg);
            height: 35px;
            width: 35px;
        }

        .iconAddTask {
            background-image: url(icons/addTask.svg);
            height: 35px;
        }

        .iconSettings {
            background-image: url(icons/settings.svg);
            height: 35px;
            width: 35px;
        }

        .iconProperties {
            background-image: url(icons/properties.svg);
            height: 35px;
            width: 35px;
        }

        .iconHamburgerMenu {
            background-image: url(icons/hamburgerMenu.svg);
        }

        .iconInvite {
            background-image: url(icons/invite.svg);
            height: 35px;
            width: 35px;
        }

        .iconTrash {
            background-image: url(icons/trash.svg);
            height: 35px;
            width: 35px;
        }



        body {
            margin: 0;
        }


        input[type="button"]{
            background-color: inherit;
            transition: box-shadow .1s,color .1s,background .1s;
            cursor: pointer;
            font-family: Inter,sans-serif;
            white-space: nowrap;
            border: none;
            text-decoration: none;
            border-radius: 8px;
        }
        a:hover{
            background-color: rgba(0, 0, 0, 0.06);
        }

        input:hover {
            background-color: rgba(0, 0, 0, 0.06);
            cursor: pointer;
        }

        .flexBody {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            min-height: 60em;
            height: 100%;
        }

        .flexMiddle {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
        }

        .leftPanel{
            flex-grow: 1;
            resize: horizontal;
            max-width: 300px;
            min-width: 220px;
            margin: 10px;
        }

        .rightPanel {
            flex-grow: 1;
            margin: 10px;
            max-width: 300px;
        }

        .middlePanel {
            flex-grow: 4;
            margin: 10px;
        }

        .topPanel {
            min-height: 5em;
            margin: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mainPanel {
            margin: 5px;
            padding: 5px;
        }

        .calendarPanel {
            min-height: 4em;
        }

        .center-content{
            display: flex;
            justify-items: center;
            justify-content: center;
            align-items: center;
            align-content: center;
        }


        .round {
            border-radius: 0.2rem;
        }

        a {
            text-decoration: none;
            color: black;
        }
        a:visited { text-decoration: none; color:black; }
        a:focus { text-decoration: none; color:black; }
        a:hover, a:active { text-decoration: none; color:black }


        .mailConfirmPad {
            display: flex;
            flex-direction: column;
            height: 350px;
            margin: 30px;
            border-radius: 0.3rem;
        }

        .mailRedirectBlock {
            height: 100px;
            margin-top: 20px;
        }

        .mailRedirectButton {
            padding: 10px;
        }

        .flex-row{
            display: flex;
            flex-direction: row;
        }
        .flex-column{
            display: flex;
            flex-direction: column;
        }
        .memberPicture {
            border-radius: 3rem;
            min-width: 40px;
            min-height: 40px;
            border: 2px black solid;
        }

        .membersTitleBlock {
            height: 38px;
            font-size: 28px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .memberFoldButton {
            display: flex;
            min-width: 32px;
            width: 100%;
            min-height: 32px;
        }

        .memberBlock {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            padding: 4px;
        }

        .memberName {
            padding: 3px;
        }

        .members {
            display: flex;
            flex-direction: column;
            margin: 4px;
        }

        .membersBlock {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            overflow-x: hidden;
            background-color: inherit;
        }
        .navigationItem a{
            display: flex;
            max-height: 1em;
            text-decoration: none;
            padding: 10px;
            margin: 1px 10px;
            border-radius: 0.5rem;
            overflow: clip;
            white-space: nowrap;
        }

        .navigationFold a{
            display: flex;
            text-decoration: none;
            height: 1.5em;
            margin: 5px;
            padding: 10px;
            font-size: 20px;
            border-radius: 0.5rem;
            overflow: clip;
            white-space: nowrap;
        }

        .userBlock {
            display: flex;
            height: 5.2em;
            flex-direction: row;
            width: auto;
            margin: 4px;
            padding: 4px;
        }

        .profileButtonsBlock {
            display: flex;
            flex-direction: column;
            width: 10%;
            align-content: center;
            align-items: center;
            padding: 3px;
        }

        .profileNameAndImageBlock {
            display: flex;
            flex-direction: column;
            width: 90%;
        }

        .profileImage{
            display: flex;
            border-radius: 4rem;
            height: 55px;
            width: 55px;
            max-height: 3em;
            max-width: 3em;
            justify-content: center;
            align-content: center;
            overflow: clip;
            margin: 3px;
            border: 2px black solid;
        }

        .profileButton {
            height: 32px;
            width: 32px;
            margin: 2px;
        }

        .profileName {
            font-size: 20px;
            overflow: clip;
            white-space: nowrap;
        }

        .foldPanelButtonBlock {
            display: flex;
            width: 100%;
        }

        .foldLeftPanelButton {
            width: 100%;
            height: 32px;
        }

        .navigation {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            background-color: inherit;
        }

        .navigationListBlock {
            overflow-x: hidden;
            margin: 4px;
            padding-bottom: 10px;
        }
        .leftPanelShader {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
            background: #F7F3E3;
            /* background: linear-gradient(90deg, rgba(194,71,175,1) 0%, rgba(220,152,210,1) 0%, rgba(228,175,220,1) 0%, rgba(251,243,250,1) 17%, rgba(255,255,255,1) 34%, rgba(249,253,253,1) 44%, rgba(250,253,253,1) 53%, rgba(255,255,255,1) 71%, rgba(221,242,244,1) 100%, rgba(171,223,227,1) 100%, rgba(255,255,255,1) 100%);
         */
        }

        .mainPanelShader {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
            background: #F6F1DF;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
            /*    background: linear-gradient(94deg, rgba(255,255,255,1) 41%, rgba(221,242,244,1) 100%, rgba(194,232,235,1) 100%, rgba(171,223,227,1) 100%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
            */
            background-image: linear-gradient(227deg, rgba(37,37,37,0.2) 0%,transparent 8%),linear-gradient(125deg, rgba(37,37,37,0.2) 0%,transparent 58%),linear-gradient(321deg, rgba(37,37,37,0.2) 0%,transparent 47%),linear-gradient(130deg, rgba(37,37,37,0.2) 0%,transparent 23%),linear-gradient(270deg, rgba(60,60,60, 0) 0%,transparent 1%),linear-gradient(90deg, rgba(56,56,56, 0) 0%,transparent 1%),repeating-linear-gradient(236deg, rgba(140,140,140,0.1) 0px,transparent 4px),repeating-linear-gradient(90deg, rgba(140,140,140,0.1) 0px,transparent 4px),repeating-linear-gradient(277deg, rgba(140,140,140,0.1) 0px,transparent 4px),linear-gradient(90deg, rgb(246,241,223),rgb(246,241,223));
        }


        .rightPanelShader {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
            background: #F7F3E3;
            /*    background: linear-gradient(277deg, rgba(194,71,175,1) 0%, rgba(220,152,210,1) 0%, rgba(228,175,220,1) 0%, rgba(251,243,250,1) 17%, rgba(255,255,255,1) 34%, rgba(249,253,253,1) 44%, rgba(250,253,253,1) 53%, rgba(255,255,255,1) 71%, rgba(221,242,244,1) 100%, rgba(171,223,227,1) 100%, rgba(255,255,255,1) 100%);
            */
        }

        .topPanelShader {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
            background: #F7F3E3;
            /*    background: radial-gradient(circle, rgba(194,232,235,1) 0%, rgba(255,255,255,1) 41%, rgba(221,242,244,1) 70%, rgba(171,223,227,1) 100%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
            */
        }

        .dayShader{
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            background: #F7F3E3;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }



        .mainBackground {
            background: #6F1A07;
            /*background: radial-gradient(circle, rgba(194,232,235,1) 0%, rgba(255,255,255,1) 41%, rgba(221,242,244,1) 70%, rgba(171,223,227,1) 100%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
            background-image: repeating-radial-gradient(circle at center center, transparent 0px, transparent 6px,rgb(215,190,233) 6px, rgb(215,190,233) 13px,transparent 13px, transparent 16px,rgb(215,190,233) 16px, rgb(215,190,233) 29px,transparent 29px, transparent 40px,rgb(215,190,233) 40px, rgb(215,190,233) 50px),repeating-radial-gradient(circle at center center, rgb(175,113,208) 0px, rgb(175,113,208) 13px,rgb(175,113,208) 13px, rgb(175,113,208) 14px,rgb(175,113,208) 14px, rgb(175,113,208) 15px,rgb(175,113,208) 15px, rgb(175,113,208) 25px,rgb(175,113,208) 25px, rgb(175,113,208) 37px,rgb(175,113,208) 37px, rgb(175,113,208) 42px); background-size: 53px 53px;
            */
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
            background-image: linear-gradient(227deg, rgba(37,37,37,0.2) 0%,transparent 8%),linear-gradient(125deg, rgba(37,37,37,0.2) 0%,transparent 58%),linear-gradient(321deg, rgba(37,37,37,0.2) 0%,transparent 47%),linear-gradient(130deg, rgba(37,37,37,0.2) 0%,transparent 23%),linear-gradient(270deg, rgba(60,60,60,0.95) 0%,transparent 1%),linear-gradient(90deg, rgba(56,56,56,0.95) 0%,transparent 1%),repeating-linear-gradient(236deg, rgba(140,140,140,0.1) 0px,transparent 4px),repeating-linear-gradient(90deg, rgba(140,140,140,0.1) 0px,transparent 4px),repeating-linear-gradient(277deg, rgba(140,140,140,0.1) 0px,transparent 4px),linear-gradient(90deg, rgb(111,26,7),rgb(111,26,7));
        }

        .navigationBlockShader {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;}

        .chkShader {
            background-color: inherit;
        }

        .mailConfirmPadShader {
            background-color: #F7F3E3;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .mailRedirectButtonShader {
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .mailRedirectBackground{
            background-color: #6F1A07;
        }

        .weekDayShader a{
            background-color: #F7F3E3;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .membersShader {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            padding-bottom: 10px;
        }

        .descriptionShader {
            box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
        }



        .TaskNameAndChk {
            display: flex;
            flex-grow: 3;
            max-width: 75%;
            flex-wrap: nowrap;
            padding: 5px;
        }

        .TaskControls {
            flex-grow: 1;
            min-width: 130px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            max-width: 130px;
        }

        .Task {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            word-wrap: break-word;
            background-color: inherit;
        }

        .taskName {
            display: flex;
            width:100%;
            height:auto;
            min-height:100%;
        }

        .taskName a{
            width:100%;
            padding: 10px;
            max-width: 320px;

        }

        .check {
            height: 24px;
            width: 24px;
        }

        .checkArea {
            display: flex;
            align-items: center;
            height: 25px;
            width: 25px;
        }


        .dayWindowDateBlock {
            margin-right: auto;
            padding: 5px 5px 5px 10px;
        }
        .dayWindowNameBlock {
            padding: 5px 5px 5px 10px;
        }
        .dayWindowButtonsBlock {
            margin-left: auto;
            justify-content: space-around;
            min-width: 100px;
        }

        .dayWindowDateClick {
            padding: 8px;
        }
        .dayWindowNameClick {
            padding: 8px;
        }

        .dayWindowDescriptionClick {
            display: flex;
        }

        .dayWindowDescriptionBlock {
            padding: 5px;
            margin: 10px;
        }

        .dayWindow {
            margin: 10px;
            max-width: 500px;
        }

        .createTaskButtonPanel{
            max-width: 400px;
            border-radius: 0.2rem;
            margin: 1em 1em 1em 66px;
            height: 30px;
        }
    </style>
@endsection
@section('content')
        <div class="flexBody mainBackground">
            <div class="leftPanel round leftPanelShader ">
                @yield('leftPanel')
            </div>
            <div class="middlePanel round">
                <div class="topPanel round topPanelShader">
                    @yield('topPanel')
                </div>
                <div class="mainPanel round mainPanelShader">
                    <div class="calendarPanel"> <!-- calendar-->
                        @yield('calendarPanel')
                    </div>
                    <div class="createTaskButtonPanel dayShader"> <!-- calendar-->
                        @yield('createTaskButton')
                    </div>
                    <div> <!-- TaskList -->
                        @yield('mainPanel')
                    </div>
                </div>
            </div>
            <div class="rightPanel round rightPanelShader">
                @yield('rightPanel')
            </div>
        </div>
@endsection

