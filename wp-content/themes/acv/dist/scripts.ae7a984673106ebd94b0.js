!function(){var e={7770:function(e,t,n){"use strict";n(6096),n(6529);var o=n(6358),a=document.querySelector(".Toggle"),r=document.querySelector("html"),i=document.querySelector("body").classList.contains("admin-bar"),c=(window.innerHeight,o.ZP.timeline({reversed:!0})),s=i?"125px":"79px";a.addEventListener("click",(function(){a.classList.toggle("open"),r.classList.toggle("show-nav"),u()})),c.fromTo(".Navigation-body",{top:"-100%"},{top:s,duration:1},"background").fromTo(".Nav--main .menu-item a",{opacity:0},{opacity:1,stagger:.2},"-=0.5");var u=function(){c.reversed()?c.timeScale(1).play():c.timeScale(3.5).reverse()},l=window.matchMedia("(min-width: 767px)");l.matches?(o.ZP.set(".Navigation-body",{clearProps:!0}),o.ZP.set(".Nav--main .menu-item a",{clearProps:!0})):(o.ZP.set(".Navigation-body",{top:"-100%"}),o.ZP.set(".Nav--main .menu-item a",{opacity:0})),l.addListener((function(e){e.matches?(o.ZP.set(".Navigation-body",{clearProps:!0}),o.ZP.set(".Nav--main .menu-item a",{clearProps:!0})):(o.ZP.set(".Navigation-body",{top:"-100%"}),o.ZP.set(".Nav--main .menu-item a",{opacity:0}))})),console.log("bundle worked")},6529:function(){}},t={};function n(o){if(t[o])return t[o].exports;var a=t[o]={exports:{}};return e[o].call(a.exports,a,a.exports,n),a.exports}n.m=e,n.x=function(){},n.d=function(e,t){for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.j=787,function(){var e={787:0},t=[[7770,216]],o=function(){},a=function(a,r){for(var i,c,s=r[0],u=r[1],l=r[2],p=r[3],m=0,f=[];m<s.length;m++)c=s[m],n.o(e,c)&&e[c]&&f.push(e[c][0]),e[c]=0;for(i in u)n.o(u,i)&&(n.m[i]=u[i]);for(l&&l(n),a&&a(r);f.length;)f.shift()();return p&&t.push.apply(t,p),o()},r=self.webpackChunkacv_theme=self.webpackChunkacv_theme||[];function i(){for(var o,a=0;a<t.length;a++){for(var r=t[a],i=!0,c=1;c<r.length;c++){var s=r[c];0!==e[s]&&(i=!1)}i&&(t.splice(a--,1),o=n(n.s=r[0]))}return 0===t.length&&(n.x(),n.x=function(){}),o}r.forEach(a.bind(null,0)),r.push=a.bind(null,r.push.bind(r));var c=n.x;n.x=function(){return n.x=c||function(){},(o=i)()}}(),n.x()}();