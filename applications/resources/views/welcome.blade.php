<!DOCTYPE html>
<html>
<head>
	<title>Gofress - Under Construction</title>
	<meta name="title" content="Gofress by Amadeo.id">
	<link rel="icon" type="image/png" href="" />
	<style type="text/css">
		body, html {
			width: 100%;
			height: 100%;
			overflow: hidden;
			padding: 0;
			margin: 0;
		}

		.background {
			background: rgb(255,255,255); /* Old browsers */
			background: -moz-radial-gradient(center, ellipse cover,	rgba(255,255,255,1) 0%, rgba(154,205,216,1) 100%); /* FF3.6-15 */
			background: -webkit-radial-gradient(center, ellipse cover,	rgba(255,255,255,1) 0%,rgba(154,205,216,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: radial-gradient(ellipse at center,	rgba(255,255,255,1) 0%,rgba(154,205,216,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#9acdd8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
		}


		.sky{
			position: absolute;
			top: 0px;
			width: 100%;
			height: 100%;
			-webkit-animation: appendSky 2.5s ease-out;
			animation: appendSky 2.5s ease-out;
		}

		.ground{
			position: absolute;
			bottom: 0px;
			width: 100%;
			height: 100%;
			-webkit-animation: appendGround 3s ease-out;
			animation: appendGround 3s ease-out;
		}

		@keyframes appendSky {
			from {transform: translate(0%, 100%);}
			to {transform: translate(0%, 0%);}
		}

		@-webkit-keyframes appendSky {
			from {-webkit-transform: translate(0%, 100%);}
			to {-webkit-transform: translate(0%, 0%);}
		}

		@keyframes appendGround {
			from {transform: translate(0%, 100%);}
			to {transform: translate(0%, 0%);}
		}

		@-webkit-keyframes appendGround {
			from {-webkit-transform: translate(0%, 100%);}
			to {-webkit-transform: translate(0%, 0%);}
		}


		.gearRotate {
			position: absolute;
			-webkit-animation: gearRotate 2s linear infinite;
			animation: gearRotate 2s linear infinite;
		}

		.gearRotateReverse {
			position: absolute;
			-webkit-animation: gearRotate 2s linear infinite reverse;
			animation: gearRotate 2s linear infinite reverse;
		}

		.gearGroup {
			-ms-transform: scale(0.25); /* IE 9 */
			-webkit-transform: scale(0.25); /* Safari */
			transform: scale(0.25);
		}

		@keyframes gearRotate {
			from {transform: rotate(0deg);}
			to {transform: rotate(360deg);}
		}

		@-webkit-keyframes gearRotate {
			from {-webkit-transform: rotate(0deg);}
			to {-webkit-transform: rotate(360deg);}
		}


		.cloud1Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 10s linear infinite reverse;
			animation: cloudTranslate 10s linear infinite reverse;
		}

		.cloud2Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 12s linear infinite reverse;
			animation: cloudTranslate 12s linear infinite reverse;
		}

		.cloud3Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 18s linear infinite reverse;
			animation: cloudTranslate 18s linear infinite reverse;
		}

		.cloud4Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 26s linear infinite reverse;
			animation: cloudTranslate 26s linear infinite reverse;
		}

		.cloud5Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 14s linear infinite reverse;
			animation: cloudTranslate 14s linear infinite reverse;
		}

		.cloud6Translate {
			position: absolute;
			-webkit-animation: cloudTranslate 34s linear infinite reverse;
			animation: cloudTranslate 34s linear infinite reverse;
		}

		@keyframes cloudTranslate {
			from {transform: translate(0%, 0%);}
			to {transform: translate(-50%, 0%);}
		}

		@-webkit-keyframes cloudTranslate {
			from {-webkit-transform: translate(0%, 0%);}
			to {-webkit-transform: translate(-50%, 0%);}
		}

		.tabletPopout {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: popout 0.5s 3s linear 1 forwards;
			animation: popout 0.5s 3s linear 1 forwards;
		}

		.laptopPopout {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: popout 0.5s 3.5s linear 1 forwards;
			animation: popout 0.5s 3.5s linear 1 forwards;
		}

		.pcPopout {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: popout 0.5s 4s linear 1 forwards;
			animation: popout 0.5s 4s linear 1 forwards;
		}

		.phonePopout {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: popout 0.5s 4.5s linear 1 forwards;
			animation: popout 0.5s 4.5s linear 1 forwards;
		}

		.tabletPopoutDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 3s linear 1 forwards;
			animation: smoke 1s 3s linear 1 forwards;
		}

		.laptopPopoutDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 3.5s linear 1 forwards;
			animation: smoke 1s 3.5s linear 1 forwards;
		}

		.pcPopoutDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 4s linear 1 forwards;
			animation: smoke 1s 4s linear 1 forwards;
		}

		.phonePopoutDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 4.5s linear 1 forwards;
			animation: smoke 1s 4.5s linear 1 forwards;
		}

		@keyframes popout {
			0% {transform: scale(0, 0);}
			80% {transform: scale(1.2, 1.3);}
			100% {transform: scale(1, 1);}
		}

		@-webkit-keyframes popout {
			0% {-webkit-transform: scale(0, 0);}
			80% {-webkit-transform: scale(1.2, 1.3);}
			100% {-webkit-transform: scale(1, 1);}
		}

		.trucktorTranslate {
			position: absolute;
			-ms-transform: translate(50%, 0%);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: translate(50%, 0%);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: translate(50%, 0%);
			transform-origin: 50% 100%;
			-webkit-animation: trucktorTranslate 5s 2s linear 1 forwards;
			animation: trucktorTranslate 5s 2s linear 1 forwards;
		}

		.smoke {
			position: absolute;
			-webkit-animation: smoke 0.8s 2s linear 6 forwards;
			animation: smoke 0.8s 2s linear 6 forwards;
		}

		.trucktorLift {
			position: absolute;
			-webkit-animation: trucktorLift 3s 7s linear 1 forwards;
			animation: trucktorLift 3s 7s linear 1 forwards;
		}

		.rulerScale {
			position: absolute;
			-ms-transform: scale(1, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(1, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(1, 0);
			transform-origin: 50% 100%;
			-webkit-animation: rulerScale 3s 7s linear 1 forwards;
			animation: rulerScale 3s 7s linear 1 forwards;
		}


		@keyframes trucktorTranslate {
			from {transform: translate(50%, 0%);}
			to {transform: translate(0%, 0%);}
		}

		@-webkit-keyframes trucktorTranslate {
			from {-webkit-transform: translate(50%, 0%);}
			to {-webkit-transform: translate(0%, 0%);}
		}

		@keyframes smoke {
			from {transform: scale(0); opacity: 1;}
			to {transform: scale(1); opacity: 0;}
		}

		@-webkit-keyframes smoke {
			from {-webkit-transform: scale(0); opacity: 1;}
			to {-webkit-transform: scale(1); opacity: 0;}
		}

		@keyframes trucktorLift {
			from {transform: translate(0px, 0px);}
			to {transform: translate(0px, -240px);}
		}

		@-webkit-keyframes trucktorLift {
			from {-webkit-transform: translate(0px, 0px);}
			to {-webkit-transform: translate(0px, -240px);}
		}

		@keyframes rulerScale {
			from {transform: scale(1, 0);}
			to {transform: scale(1, 1);}
		}

		@-webkit-keyframes rulerScale {
			from {-webkit-transform: scale(1, 0);}
			to {-webkit-transform: scale(1, 1);}
		}

		.paintBrust{
			position: absolute;
			-webkit-animation: liftBrust 3s 4s linear 1 forwards;
			animation: liftBrust 1s 4s linear 1 forwards;
		}

		.paintBrusting{
			position: absolute;
			-webkit-animation: brusting 2s 5s linear infinite alternate;
			animation: brusting 2s 5s linear infinite alternate;
		}

		@keyframes liftBrust {
			from {transform: translate(0px, 0px);}
			to {transform: translate(-300px, -200px);}
		}

		@-webkit-keyframes liftBrust {
			from {-webkit-transform: translate(0px, 0px);}
			to {-webkit-transform: translate(-300px, -200px);}
		}

		@keyframes brusting {
			from {transform: translate(0px, 0px);}
			to {transform: translate(0px, -50px);}
		}

		@-webkit-keyframes brusting {
			from {-webkit-transform: translate(0px, 0px);}
			to {-webkit-transform: translate(0px, -50px);}
		}

		.loopAppend{
			position: absolute;
			animation: append linear 1s 5s forwards;
			animation-iteration-count: 1;
			transform:	translate(0px,400px);
			transform-origin: 50% 50%;
			-webkit-animation: append linear 1s 5s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	translate(0px,400px);
			-webkit-transform-origin: 50% 50%;
			-moz-animation: append linear 1s 5s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	translate(0px,400px);
			-moz-transform-origin: 50% 50%;
			-o-animation: append linear 1s 5s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	translate(0px,400px);
			-o-transform-origin: 50% 50%;
			-ms-animation: append linear 1s 5s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	translate(0px,400px);
			-ms-transform-origin: 50% 50%;
		}

		@keyframes append{
			0% {
				transform:	translate(0px,400px)	;
			}
			100% {
				transform:	translate(0px,0px)	;
			}
		}

		@-moz-keyframes append{
			0% {
				-moz-transform:	translate(0px,400px)	;
			}
			100% {
				-moz-transform:	translate(0px,0px)	;
			}
		}

		@-webkit-keyframes append {
			0% {
				-webkit-transform:	translate(0px,400px)	;
			}
			100% {
				-webkit-transform:	translate(0px,0px)	;
			}
		}

		@-o-keyframes append {
			0% {
				-o-transform:	translate(0px,400px)	;
			}
			100% {
				-o-transform:	translate(0px,0px)	;
			}
		}

		@-ms-keyframes append {
			0% {
				-ms-transform:	translate(0px,400px)	;
			}
			100% {
				-ms-transform:	translate(0px,0px)	;
			}
		}

		.loopSearch{
			position: absolute;
			animation: searching linear 4s 6s;
			animation-iteration-count: infinite forwards;
			transform-origin: 50% 50%;
			-webkit-animation: searching linear 4s 6s;
			-webkit-animation-iteration-count: infinite;
			-webkit-transform-origin: 50% 50%;
			-moz-animation: searching linear 4s 6s;
			-moz-animation-iteration-count: infinite;
			-moz-transform-origin: 50% 50%;
			-o-animation: searching linear 4s 6s;
			-o-animation-iteration-count: infinite;
			-o-transform-origin: 50% 50%;
			-ms-animation: searching linear 4s 6s;
			-ms-animation-iteration-count: infinite;
			-ms-transform-origin: 50% 50%;
		}

		@keyframes searching{
			0% {
				transform:	translate(0px,0px)	;
			}
			26% {
				transform:	translate(-50px,0px)	;
			}
			50% {
				transform:	translate(-50px,-50px)	;
			}
			73% {
				transform:	translate(0px,-50px)	;
			}
			100% {
				transform:	translate(0px,0px)	;
			}
		}

		@-moz-keyframes searching{
			0% {
				-moz-transform:	translate(0px,0px)	;
			}
			26% {
				-moz-transform:	translate(-50px,0px)	;
			}
			50% {
				-moz-transform:	translate(-50px,-50px)	;
			}
			73% {
				-moz-transform:	translate(0px,-50px)	;
			}
			100% {
				-moz-transform:	translate(0px,0px)	;
			}
		}

		@-webkit-keyframes searching {
			0% {
				-webkit-transform:	translate(0px,0px)	;
			}
			26% {
				-webkit-transform:	translate(-50px,0px)	;
			}
			50% {
				-webkit-transform:	translate(-50px,-50px)	;
			}
			73% {
				-webkit-transform:	translate(0px,-50px)	;
			}
			100% {
				-webkit-transform:	translate(0px,0px)	;
			}
		}

		@-o-keyframes searching {
			0% {
				-o-transform:	translate(0px,0px)	;
			}
			26% {
				-o-transform:	translate(-50px,0px)	;
			}
			50% {
				-o-transform:	translate(-50px,-50px)	;
			}
			73% {
				-o-transform:	translate(0px,-50px)	;
			}
			100% {
				-o-transform:	translate(0px,0px)	;
			}
		}

		@-ms-keyframes searching {
			0% {
				-ms-transform:	translate(0px,0px)	;
			}
			26% {
				-ms-transform:	translate(-50px,0px)	;
			}
			50% {
				-ms-transform:	translate(-50px,-50px)	;
			}
			73% {
				-ms-transform:	translate(0px,-50px)	;
			}
			100% {
				-ms-transform:	translate(0px,0px)	;
			}
		}

		.bucketRed{
			position: absolute;
			animation: drop linear 0.2s 5.1s forwards;
			animation-iteration-count: 1;
			transform:	translate(0px,-300px);
			transform-origin: 50% 50%;
			-webkit-animation: drop linear 0.2s 5.1s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	translate(0px,-300px);
			-webkit-transform-origin: 50% 50%;
			-moz-animation: drop linear 0.2s 5.1s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	translate(0px,-300px);
			-moz-transform-origin: 50% 50%;
			-o-animation: drop linear 0.2s 5.1s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	translate(0px,-300px);
			-o-transform-origin: 50% 50%;
			-ms-animation: drop linear 0.2s 5.1s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	translate(0px,-300px);
			-ms-transform-origin: 50% 50%;
		}

		.bucketRedDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 5.3s linear 1 forwards;
			animation: smoke 1s 5.3s linear 1 forwards;
		}

		.bucketBlue{
			position: absolute;
			animation: drop linear 0.2s 5.2s forwards;
			animation-iteration-count: 1;
			transform:	translate(0px,-300px);
			transform-origin: 50% 50%;
			-webkit-animation: drop linear 0.2s 5.2s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	translate(0px,-300px);
			-webkit-transform-origin: 50% 50%;
			-moz-animation: drop linear 0.2s 5.2s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	translate(0px,-300px);
			-moz-transform-origin: 50% 50%;
			-o-animation: drop linear 0.2s 5.2s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	translate(0px,-300px);
			-o-transform-origin: 50% 50%;
			-ms-animation: drop linear 0.2s 5.2s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	translate(0px,-300px);
			-ms-transform-origin: 50% 50%;
		}

		.bucketBlueDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 5.4s linear 1 forwards;
			animation: smoke 1s 5.4s linear 1 forwards;
		}

		.bucketYellow{
			position: absolute;
			animation: drop linear 0.2s 5.3s forwards;
			animation-iteration-count: 1;
			transform:	translate(0px,-300px);
			transform-origin: 50% 50%;
			-webkit-animation: drop linear 0.2s 5.3s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	translate(0px,-300px);
			-webkit-transform-origin: 50% 50%;
			-moz-animation: drop linear 0.2s 5.3s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	translate(0px,-300px);
			-moz-transform-origin: 50% 50%;
			-o-animation: drop linear 0.2s 5.3s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	translate(0px,-300px);
			-o-transform-origin: 50% 50%;
			-ms-animation: drop linear 0.2s 5.3s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	translate(0px,-300px);
			-ms-transform-origin: 50% 50%;
		}

		.bucketYellowDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 5.5s linear 1 forwards;
			animation: smoke 1s 5.5s linear 1 forwards;
		}

		.digindo{
			position: absolute;
			animation: drop linear 0.2s 11s forwards;
			animation-iteration-count: 1;
			transform:	translate(0px,-300px);
			transform-origin: 50% 50%;
			-webkit-animation: drop linear 0.2s 11s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	translate(0px,-300px);
			-webkit-transform-origin: 50% 50%;
			-moz-animation: drop linear 0.2s 11s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	translate(0px,-300px);
			-moz-transform-origin: 50% 50%;
			-o-animation: drop linear 0.2s 11s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	translate(0px,-300px);
			-o-transform-origin: 50% 50%;
			-ms-animation: drop linear 0.2s 11s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	translate(0px,-300px);
			-ms-transform-origin: 50% 50%;
		}

		.digindoDust {
			position: absolute;
			-ms-transform: scale(0, 0);
			-ms-transform-origin: 50% 0%; /* IE 9 */
			-webkit-transform: scale(0, 0);
			-webkit-transform-origin: 50% 100%; /* Chrome, Safari, Opera */
			transform: scale(0, 0);
			transform-origin: 50% 100%;
			-webkit-animation: smoke 1s 11.2s linear 1 forwards;
			animation: smoke 1s 11.2s linear 1 forwards;
		}

		@keyframes drop{
			0% {
				transform:	translate(0px,-300px)	;
			}
			100% {
				transform:	translate(0px,0px)	;
			}
		}

		@-moz-keyframes drop{
			0% {
				-moz-transform:	translate(0px,-300px)	;
			}
			100% {
				-moz-transform:	translate(0px,0px)	;
			}
		}

		@-webkit-keyframes drop {
			0% {
				-webkit-transform:	translate(0px,-300px)	;
			}
			100% {
				-webkit-transform:	translate(0px,0px)	;
			}
		}

		@-o-keyframes drop {
			0% {
				-o-transform:	translate(0px,-300px)	;
			}
			100% {
				-o-transform:	translate(0px,0px)	;
			}
		}

		@-ms-keyframes drop {
			0% {
				-ms-transform:	translate(0px,-300px)	;
			}
			100% {
				-ms-transform:	translate(0px,0px)	;
			}
		}

		.ladder{
			position: absolute;
			animation: bringUp linear 0.5s 4.1s forwards;
			animation-iteration-count: 1;
			transform:	rotate(-90deg) ;
			transform-origin: 50% 100%;
			-webkit-animation: bringUp linear 0.5s 4.1s forwards;
			-webkit-animation-iteration-count: 1;
			-webkit-transform:	rotate(-90deg) ;
			-webkit-transform-origin: 50% 100%;
			-moz-animation: bringUp linear 0.5s 4.1s forwards;
			-moz-animation-iteration-count: 1;
			-moz-transform:	rotate(-90deg) ;
			-moz-transform-origin: 50% 100%;
			-o-animation: bringUp linear 0.5s  4.1s forwards;
			-o-animation-iteration-count: 1;
			-o-transform:	rotate(-90deg) ;
			-o-transform-origin: 50% 100%;
			-ms-animation: bringUp linear 0.5s 4.1s forwards;
			-ms-animation-iteration-count: 1;
			-ms-transform:	rotate(-90deg) ;
			-ms-transform-origin: 50% 100% forwards;
		}

		@keyframes bringUp{
			0% {
				transform:	rotate(-90deg) ;
			}
			100% {
				transform:	rotate(0deg) ;
			}
		}

		@-moz-keyframes bringUp{
			0% {
				-moz-transform:	rotate(-90deg) ;
			}
			100% {
				-moz-transform:	rotate(0deg) ;
			}
		}

		@-webkit-keyframes bringUp {
			0% {
				-webkit-transform:	rotate(-90deg) ;
			}
			100% {
				-webkit-transform:	rotate(0deg) ;
			}
		}

		@-o-keyframes bringUp {
			0% {
				-o-transform:	rotate(-90deg) ;
			}
			100% {
				-o-transform:	rotate(0deg) ;
			}
		}

		@-ms-keyframes bringUp {
			0% {
				-ms-transform:	rotate(-90deg) ;
			}
			100% {
				-ms-transform:	rotate(0deg) ;
			}
		}


	</style>
</head>
<body class="background">
	<div style="position: absolute;top: 15px;width: 100%;z-index: 1;">
		<div style="position: relative; margin: 0 auto;width: 100%; text-align: center;">
			<h1 style="color: rgb(85,85,85); font-size: 38px; margin: 5px 0; font-family: arial;">Under Construction</h1>
			<h3 style="color: rgb(85,85,85); font-size: 20px; margin: 0 0; font-family: arial; font-weight: lighter;">The page you're looking for is coming soon!</h3>
		</div>
	</div>

	<div class="sky">

		<div class="cloudGroup">
			<img src="{{ asset('under/cloud1.png') }}" class="cloud1Translate" width="200%" style="top: 150px;left: 0px;">
			<img src="{{ asset('under/cloud2.png') }}" class="cloud2Translate" width="200%" style="top: 67px;left: 0px;">
			<img src="{{ asset('under/cloud3.png') }}" class="cloud3Translate" width="200%" style="top: 0px;left: 0px;">
			<img src="{{ asset('under/cloud4.png') }}" class="cloud4Translate" width="200%" style="top: 143px;left: 0px;">
			<img src="{{ asset('under/cloud5.png') }}" class="cloud5Translate" width="200%" style="top: 72px;left: 0px;">
			<img src="{{ asset('under/cloud6.png') }}" class="cloud6Translate" width="200%" style="top: 106px;left: 0px;">
		</div>



	</div>
	<div class="ground">
		<div style="position: absolute;bottom: 0px;width: 100%;height: 300px;background: #FFF0CD;z-index: -1;"></div>

		<div style="max-width: 1366px;min-width: 1366px;position: absolute;max-height: 786px;min-height: 786px;left: 50%;">
			<div style="position: relative;left: -50%;min-height: 786px;max-height: 786px;">
				<div style="position: absolute;bottom: 0;width: 100%;">
					<img src="{{ asset('under/shadow.png') }}" class="" style="bottom: 218px;right: 179px;position: absolute;" height="25">
				</div>

				<div class="gearGroup" style="position: absolute;top: 194px;left: 272px;">
					<img src="{{ asset('under/gear-small-white.png') }}" class="gearRotate" style="top: 0px;left: 0px;">
					<img src="{{ asset('under/gear-big-black.png') }}" class="gearRotateReverse" style="top: 76px;left: 55px;">
					<img src="{{ asset('under/gear-big-white.png') }}" class="gearRotate" style="top: -66px;left: 217px;">
					<img src="{{ asset('under/gear-small-black.png') }}" class="gearRotateReverse" style="top: -7px;left: 432px;">
				</div>

				<div style="position: absolute;bottom: 0px;width: 100%;">
					<img src="{{ asset('under/pc.png') }}" width="400px" class="pcPopout" style="bottom: 228px;right: 409px;">
					<img src="{{ asset('under/dust.png') }}" width="400px" class="pcPopoutDust" style="bottom: 228px;right: 409px;">

					<div class="paintBrust" style="width: 100%">
						<img src="{{ asset('under/paint.png') }}" width="300px" class="paintBrusting" style="bottom: 228px;right: 459px;">
					</div>

					<img src="{{ asset('under/tablet.png') }}" width="180px" class="tabletPopout" style="bottom: 228px;left: 277px;">
					<img src="{{ asset('under/dust.png') }}" width="180px" class="tabletPopoutDust" style="bottom: 228px;left: 277px;">

					<img src="{{ asset('under/ladder.png') }}" width="30px" class="ladder" style="bottom: 203px;left: 306px;">

					<img src="{{ asset('under/laptop.png') }}" width="320px" class="laptopPopout" style="bottom: 228px;left: 406px;">
					<img src="{{ asset('under/dust.png') }}" width="320px" class="laptopPopoutDust" style="bottom: 228px;left: 406px;">

					<img src="{{ asset('under/ruler.png') }}" height="250px" class="rulerScale" style="bottom: 228px;right: 244px;">
					<div class="trucktorLift" style="width: 100%;">
						<div class="trucktorTranslate" style="width: 100%;">
							<img src="{{ asset('under/trucktor.png') }}" width="250px" style="position: absolute;bottom: 228px;right: 241px;">
							<img src="{{ asset('under/smoke.png') }}" width="100px" class="smoke" style="position: absolute;bottom: 200px;right: 150px;">
						</div>
					</div>

					<img src="{{ asset('under/phone.png') }}" width="100px" class="phonePopout" style="bottom: 228px;right: 332px;">
					<img src="{{ asset('under/dust.png') }}" width="100px" class="phonePopoutDust" style="bottom: 228px;right: 332px;">

				</div>

				<div style="position: absolute;bottom: 0px;width: 100%;">
					<img src="{{ asset('under/enviroment.png') }}" height="250px" class="" style="bottom: 19px;right: 266px;position: absolute;">
				</div>

				<div class="loopAppend" style="bottom: 336px;left: 531px;">
					<img src="{{ asset('under/loop.png') }}" width="100px" class="loopSearch">
				</div>
		    </div>



		</div>

	</div>

	<div style="max-width: 1366px;min-width: 1366px;position: absolute;max-height: 786px;min-height: 786px;left: 50%;">
		<div style="position: relative;left: -50%;min-height: 786px;max-height: 786px;">
			<div class="bucketRed" style="top: 189px;left: 548px;width: 100%;">
				<img src="{{ asset('under/bucket-red.png') }}" width="30px" style="position: absolute;left: 35px;top: 0px;">
				<img src="{{ asset('under/dust.png') }}" class="bucketRedDust" width="100px" style="position: absolute;left: 0px;top: 10px;">
			</div>

			<div class="bucketBlue" style="top: 189px;left: 587px;width: 100%;">
				<img src="{{ asset('under/bucket-blue.png') }}" width="30px" style="position: absolute;left: 35px;top: 0px;">
				<img src="{{ asset('under/dust.png') }}" class="bucketBlueDust" width="100px" style="position: absolute;left: 0px;top: 10px;">
			</div>

			<div class="bucketYellow" style="top: 189px;left: 626px;width: 100%;">
				<img src="{{ asset('under/bucket-yellow.png') }}" width="30px" style="position: absolute;left: 35px;top: 0px;">
				<img src="{{ asset('under/dust.png') }}" class="bucketYellowDust" width="100px" style="position: absolute;left: 0px;top: 10px;">
			</div>

			<div class="digindo" style="top: 189px;left: 818px;width: 100%;">
				<img src="{{ asset('under/amadeo.png') }}" width="130px" style="position: absolute;left: -15px;top: 10px; cursor: pointer;" onclick="location.href='http://amadeo.id/'">
				<img src="{{ asset('under/dust.png') }}" class="digindoDust" width="150px" style="position: absolute;left: -28px;top: -3px;">
			</div>
		</div>
	</div>



</body>
</html>
