/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/payment.js":
/*!****************************************!*\
  !*** ./resources/assets/js/payment.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* 基本設定*/
// ここにStripeから発行された公開可能キーを入力
var stripe = Stripe(stripe_public_key);
var elements = stripe.elements();
/* Stripe Elementsを使ったFormの各パーツをどんなデザインにしたいかを定義 */
// const style = {
//     base: {
//         fontSize: "12px",
//         color: "#32325d",
//         border: "solid 1px ccc"
//     }
// };

/* フォームでdivタグになっている部分をStripe Elementsを使ってフォームに変換 */

var cardNumber = elements.create("cardNumber", {});
cardNumber.mount("#cardNumber");
var cardCvc = elements.create("cardCvc", {});
cardCvc.mount("#securityCode");
var cardExpiry = elements.create("cardExpiry", {});
cardExpiry.mount("#expiration");
/* id="form_paymentがついたFormのsubmitEvent発生時のプログラム処理を定義"*/
//トークン作成もしくはエラー表示

document.querySelector("#form_payment").addEventListener("submit", function (e) {
  /* 何も処理をかまさないとそのままクレジットカード情報が送信されてしまうので一旦HTMLのFormタグがが従来もっている送信機能を停止させる。 */
  e.preventDefault();
  /* Stripe.jsを使って、フォームに入力されたコードをStripe側に送信。今回ご紹介している方法の場合、「カード名義」だけはStripe Elementsの仕組みを使っていないため、このままだとカード名義の情報が足りずにカード情報の暗号化ができなくなってしまうので、{name:document.querySelector('#cardName').value}を足すことで、フォームに入力されたカード名義情報も、他の情報と同時にStripeに送ることができるようになる。 */

  stripe.createToken(cardNumber, {
    name: document.querySelector("#cardName").value
  }).then(function (result) {
    // エラー表示

    /* errorが返ってきた場合はその旨を表示 */
    if (result.error) {
      alert("カード登録処理時にエラーが発生しました。カード番号が正しいものかどうかをご確認いただくか、別のクレジットカードで登録してみてください。");
    } else {
      // トークンをサーバに送信

      /* 暗号化されたコードが返ってきた場合は以下のStripeTokenHandler関数を実行。その際、引数として暗号化されたコードを渡してあげる。 */
      stripeTokenHandler(result.token);
    }
  });
  /* id="form_payment"が指定されたformの送信ボタン直前に、input type="hidden"のHTMLを挿入し、値にStripeから返ってきた暗号化情報を設定。そして、実際にフォームの内容を送信（事実上、送信されるのは暗号化情報のみとなる） */
  //トークンをバックエンドへ渡す

  function stripeTokenHandler(token) {
    // tokenをフォームへ包含し送信
    var form = document.getElementById("form_payment");
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "stripeToken");
    hiddenInput.setAttribute("value", token.id);
    form.appendChild(hiddenInput);
    form.submit();
  }
}, false);

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/assets/js/payment.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/h/webproject/011_laravel/app/resources/assets/js/payment.js */"./resources/assets/js/payment.js");


/***/ })

/******/ });