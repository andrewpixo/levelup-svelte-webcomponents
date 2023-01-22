(function(){const e=document.createElement("link").relList;if(e&&e.supports&&e.supports("modulepreload"))return;for(const r of document.querySelectorAll('link[rel="modulepreload"]'))o(r);new MutationObserver(r=>{for(const i of r)if(i.type==="childList")for(const u of i.addedNodes)u.tagName==="LINK"&&u.rel==="modulepreload"&&o(u)}).observe(document,{childList:!0,subtree:!0});function n(r){const i={};return r.integrity&&(i.integrity=r.integrity),r.referrerpolicy&&(i.referrerPolicy=r.referrerpolicy),r.crossorigin==="use-credentials"?i.credentials="include":r.crossorigin==="anonymous"?i.credentials="omit":i.credentials="same-origin",i}function o(r){if(r.ep)return;r.ep=!0;const i=n(r);fetch(r.href,i)}})();function d(){}function N(t){return t()}function P(){return Object.create(null)}function b(t){t.forEach(N)}function C(t){return typeof t=="function"}function B(t,e){return t!=t?e==e:t!==e||t&&typeof t=="object"||typeof t=="function"}function V(t){return Object.keys(t).length===0}function E(t,e){t.appendChild(e)}function m(t,e,n){t.insertBefore(e,n||null)}function g(t){t.parentNode&&t.parentNode.removeChild(t)}function _(t){return document.createElement(t)}function I(t){return document.createTextNode(t)}function q(){return I(" ")}function L(t,e,n,o){return t.addEventListener(e,n,o),()=>t.removeEventListener(e,n,o)}function h(t,e,n){n==null?t.removeAttribute(e):t.getAttribute(e)!==n&&t.setAttribute(e,n)}function z(t){return Array.from(t.childNodes)}function D(t,e){e=""+e,t.wholeText!==e&&(t.data=e)}function F(t){const e={};for(const n of t)e[n.name]=n.value;return e}let O;function y(t){O=t}const p=[],$=[],w=[],R=[],G=Promise.resolve();let j=!1;function J(){j||(j=!0,G.then(x))}function M(t){w.push(t)}const v=new Set;let k=0;function x(){const t=O;do{for(;k<p.length;){const e=p[k];k++,y(e),Q(e.$$)}for(y(null),p.length=0,k=0;$.length;)$.pop()();for(let e=0;e<w.length;e+=1){const n=w[e];v.has(n)||(v.add(n),n())}w.length=0}while(p.length);for(;R.length;)R.pop()();j=!1,v.clear(),y(t)}function Q(t){if(t.fragment!==null){t.update(),b(t.before_update);const e=t.dirty;t.dirty=[-1],t.fragment&&t.fragment.p(t.ctx,e),t.after_update.forEach(M)}}const U=new Set;function W(t,e){t&&t.i&&(U.delete(t),t.i(e))}function X(t,e,n,o){const{fragment:r,after_update:i}=t.$$;r&&r.m(e,n),o||M(()=>{const u=t.$$.on_mount.map(N).filter(C);t.$$.on_destroy?t.$$.on_destroy.push(...u):b(u),t.$$.on_mount=[]}),i.forEach(M)}function Y(t,e){const n=t.$$;n.fragment!==null&&(b(n.on_destroy),n.fragment&&n.fragment.d(e),n.on_destroy=n.fragment=null,n.ctx=[])}function Z(t,e){t.$$.dirty[0]===-1&&(p.push(t),J(),t.$$.dirty.fill(0)),t.$$.dirty[e/31|0]|=1<<e%31}function K(t,e,n,o,r,i,u,s=[-1]){const c=O;y(t);const l=t.$$={fragment:null,ctx:[],props:i,update:d,not_equal:r,bound:P(),on_mount:[],on_destroy:[],on_disconnect:[],before_update:[],after_update:[],context:new Map(e.context||(c?c.$$.context:[])),callbacks:P(),dirty:s,skip_bound:!1,root:e.target||c.$$.root};u&&u(l.root);let f=!1;if(l.ctx=n?n(t,e.props||{},(a,A,...H)=>{const S=H.length?H[0]:A;return l.ctx&&r(l.ctx[a],l.ctx[a]=S)&&(!l.skip_bound&&l.bound[a]&&l.bound[a](S),f&&Z(t,a)),A}):[],l.update(),f=!0,b(l.before_update),l.fragment=o?o(l.ctx):!1,e.target){if(e.hydrate){const a=z(e.target);l.fragment&&l.fragment.l(a),a.forEach(g)}else l.fragment&&l.fragment.c();e.intro&&W(t.$$.fragment),X(t,e.target,e.anchor,e.customElement),x()}y(c)}let T;typeof HTMLElement=="function"&&(T=class extends HTMLElement{constructor(){super(),this.attachShadow({mode:"open"})}connectedCallback(){const{on_mount:t}=this.$$;this.$$.on_disconnect=t.map(N).filter(C);for(const e in this.$$.slotted)this.appendChild(this.$$.slotted[e])}attributeChangedCallback(t,e,n){this[t]=n}disconnectedCallback(){b(this.$$.on_disconnect)}$destroy(){Y(this,1),this.$destroy=d}$on(t,e){if(!C(e))return d;const n=this.$$.callbacks[t]||(this.$$.callbacks[t]=[]);return n.push(e),()=>{const o=n.indexOf(e);o!==-1&&n.splice(o,1)}}$set(t){this.$$set&&!V(t)&&(this.$$.skip_bound=!0,this.$$set(t),this.$$.skip_bound=!1)}});function tt(t){let e,n,o,r,i,u;return{c(){e=_("button"),e.textContent="Increment",n=q(),o=_("p"),r=I(t[0]),this.c=d,h(o,"data-testid","counter-value")},m(s,c){m(s,e,c),t[3](e),m(s,n,c),m(s,o,c),E(o,r),i||(u=L(e,"click",t[2]),i=!0)},p(s,[c]){c&1&&D(r,s[0])},i:d,o:d,d(s){s&&g(e),t[3](null),s&&g(n),s&&g(o),i=!1,u()}}}function et(t,e,n){let{count:o=0}=e,r;const i=()=>{n(0,o+=1);let s=new CustomEvent("on-increment",{bubbles:!0,composed:!0,detail:{value:o}});r.dispatchEvent(s)};function u(s){$[s?"unshift":"push"](()=>{r=s,n(1,r)})}return t.$$set=s=>{"count"in s&&n(0,o=s.count)},[o,r,i,u]}class nt extends T{constructor(e){super(),K(this,{target:this.shadowRoot,props:F(this.attributes),customElement:!0},et,tt,B,{count:0},null),e&&(e.target&&m(e.target,this,e.anchor),e.props&&(this.$set(e.props),x()))}static get observedAttributes(){return["count"]}get count(){return this.$$.ctx[0]}set count(e){this.$$set({count:e}),x()}}customElements.define("test-counter",nt);function rt(t){let e,n,o,r,i,u;return{c(){e=_("div"),n=_("button"),n.innerHTML='<slot name="left"></slot>',o=q(),r=_("button"),r.innerHTML='<slot name="right"></slot>',this.c=d,h(n,"data-testid","left-btn"),h(n,"part","button-element"),h(n,"class","button-element button-element-left"),h(r,"data-testid","right-btn"),h(r,"part","button-element"),h(r,"class","button-element button-element-right"),h(e,"part","button-group"),h(e,"class","button-group")},m(s,c){m(s,e,c),E(e,n),t[3](n),E(e,o),E(e,r),t[5](r),i||(u=[L(n,"click",t[4]),L(r,"click",t[6])],i=!0)},p:d,i:d,o:d,d(s){s&&g(e),t[3](null),t[5](null),i=!1,b(u)}}}function ot(t,e,n){let o,r;const i=f=>{let a=new CustomEvent("custom-button-click",{detail:{version:f},bubbles:!0,composed:!0});f==="left"?o.dispatchEvent(a):f==="right"&&r.dispatchEvent(a)};function u(f){$[f?"unshift":"push"](()=>{o=f,n(0,o)})}const s=()=>i("left");function c(f){$[f?"unshift":"push"](()=>{r=f,n(1,r)})}return[o,r,i,u,s,c,()=>i("right")]}class it extends T{constructor(e){super(),this.shadowRoot.innerHTML="<style>.button-group{display:flex;flex-direction:row;justify-content:center;align-items:center}.button-element{display:flex;flex-direction:row;justify-content:center;align-items:center;padding:0.5rem 1rem;border:1px solid #ccc;cursor:pointer;transition:all 0.2s ease-in-out}.button-element:hover{background-color:#eee}.button-element:active{background-color:#ddd}.button-element-left{border-top-left-radius:0.5rem;border-bottom-left-radius:0.5rem}.button-element-right{border-top-right-radius:0.5rem;border-bottom-right-radius:0.5rem}</style>",K(this,{target:this.shadowRoot,props:F(this.attributes),customElement:!0},ot,rt,B,{},null),e&&e.target&&m(e.target,this,e.anchor)}}customElements.define("custom-button",it);
