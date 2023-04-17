// modules are defined as an array
// [ module function, map of requires ]
//
// map of requires is short require name -> numeric require
//
// anything defined in a previous bundle is accessed via the
// orig method which is the require for previous bundles
parcelRequire = (function (modules, cache, entry, globalName) {
  // Save the require from previous bundle to this closure if any
  var previousRequire = typeof parcelRequire === 'function' && parcelRequire;
  var nodeRequire = typeof require === 'function' && require;

  function newRequire(name, jumped) {
    if (!cache[name]) {
      if (!modules[name]) {
        // if we cannot find the module within our internal map or
        // cache jump to the current global require ie. the last bundle
        // that was added to the page.
        var currentRequire = typeof parcelRequire === 'function' && parcelRequire;
        if (!jumped && currentRequire) {
          return currentRequire(name, true);
        }

        // If there are other bundles on this page the require from the
        // previous one is saved to 'previousRequire'. Repeat this as
        // many times as there are bundles until the module is found or
        // we exhaust the require chain.
        if (previousRequire) {
          return previousRequire(name, true);
        }

        // Try the node require function if it exists.
        if (nodeRequire && typeof name === 'string') {
          return nodeRequire(name);
        }

        var err = new Error('Cannot find module \'' + name + '\'');
        err.code = 'MODULE_NOT_FOUND';
        throw err;
      }

      localRequire.resolve = resolve;
      localRequire.cache = {};

      var module = cache[name] = new newRequire.Module(name);

      modules[name][0].call(module.exports, localRequire, module, module.exports, this);
    }

    return cache[name].exports;

    function localRequire(x){
      return newRequire(localRequire.resolve(x));
    }

    function resolve(x){
      return modules[name][1][x] || x;
    }
  }

  function Module(moduleName) {
    this.id = moduleName;
    this.bundle = newRequire;
    this.exports = {};
  }

  newRequire.isParcelRequire = true;
  newRequire.Module = Module;
  newRequire.modules = modules;
  newRequire.cache = cache;
  newRequire.parent = previousRequire;
  newRequire.register = function (id, exports) {
    modules[id] = [function (require, module) {
      module.exports = exports;
    }, {}];
  };

  var error;
  for (var i = 0; i < entry.length; i++) {
    try {
      newRequire(entry[i]);
    } catch (e) {
      // Save first error but execute all entries
      if (!error) {
        error = e;
      }
    }
  }

  if (entry.length) {
    // Expose entry point to Node, AMD or browser globals
    // Based on https://github.com/ForbesLindesay/umd/blob/master/template.js
    var mainExports = newRequire(entry[entry.length - 1]);

    // CommonJS
    if (typeof exports === "object" && typeof module !== "undefined") {
      module.exports = mainExports;

    // RequireJS
    } else if (typeof define === "function" && define.amd) {
     define(function () {
       return mainExports;
     });

    // <script>
    } else if (globalName) {
      this[globalName] = mainExports;
    }
  }

  // Override the current require with this new one
  parcelRequire = newRequire;

  if (error) {
    // throw error from earlier, _after updating parcelRequire_
    throw error;
  }

  return newRequire;
})({"pLgq":[function(require,module,exports) {
var define;
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

/**
 * SVGInjector v1.1.3 - Fast, caching, dynamic inline SVG DOM injection library
 * https://github.com/iconic/SVGInjector
 *
 * Copyright (c) 2014-2015 Waybury <hello@waybury.com>
 * @license MIT
 */
!function (t, e) {
  "use strict";

  function r(t) {
    t = t.split(" ");

    for (var e = {}, r = t.length, n = []; r--;) {
      e.hasOwnProperty(t[r]) || (e[t[r]] = 1, n.unshift(t[r]));
    }

    return n.join(" ");
  }

  var n = "file:" === t.location.protocol,
      i = e.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1"),
      o = Array.prototype.forEach || function (t, e) {
    if (void 0 === this || null === this || "function" != typeof t) throw new TypeError();
    var r,
        n = this.length >>> 0;

    for (r = 0; n > r; ++r) {
      r in this && t.call(e, this[r], r, this);
    }
  },
      a = {},
      l = 0,
      s = [],
      u = [],
      c = {},
      f = function f(t) {
    return t.cloneNode(!0);
  },
      p = function p(t, e) {
    u[t] = u[t] || [], u[t].push(e);
  },
      d = function d(t) {
    for (var e = 0, r = u[t].length; r > e; e++) {
      !function (e) {
        setTimeout(function () {
          u[t][e](f(a[t]));
        }, 0);
      }(e);
    }
  },
      v = function v(e, r) {
    if (void 0 !== a[e]) a[e] instanceof SVGSVGElement ? r(f(a[e])) : p(e, r);else {
      if (!t.XMLHttpRequest) return r("Browser does not support XMLHttpRequest"), !1;
      a[e] = {}, p(e, r);
      var i = new XMLHttpRequest();
      i.onreadystatechange = function () {
        if (4 === i.readyState) {
          if (404 === i.status || null === i.responseXML) return r("Unable to load SVG file: " + e), n && r("Note: SVG injection ajax calls do not work locally without adjusting security setting in your browser. Or consider using a local webserver."), r(), !1;
          if (!(200 === i.status || n && 0 === i.status)) return r("There was a problem injecting the SVG: " + i.status + " " + i.statusText), !1;
          if (i.responseXML instanceof Document) a[e] = i.responseXML.documentElement;else if (DOMParser && DOMParser instanceof Function) {
            var t;

            try {
              var o = new DOMParser();
              t = o.parseFromString(i.responseText, "text/xml");
            } catch (l) {
              t = void 0;
            }

            if (!t || t.getElementsByTagName("parsererror").length) return r("Unable to parse SVG file: " + e), !1;
            a[e] = t.documentElement;
          }
          d(e);
        }
      }, i.open("GET", e), i.overrideMimeType && i.overrideMimeType("text/xml"), i.send();
    }
  },
      h = function h(e, n, a, u) {
    var f = e.getAttribute("data-src") || e.getAttribute("src");
    if (!/\.svg/i.test(f)) return void u("Attempted to inject a file with a non-svg extension: " + f);

    if (!i) {
      var p = e.getAttribute("data-fallback") || e.getAttribute("data-png");
      return void (p ? (e.setAttribute("src", p), u(null)) : a ? (e.setAttribute("src", a + "/" + f.split("/").pop().replace(".svg", ".png")), u(null)) : u("This browser does not support SVG and no PNG fallback was defined."));
    }

    -1 === s.indexOf(e) && (s.push(e), e.setAttribute("src", ""), v(f, function (i) {
      if ("undefined" == typeof i || "string" == typeof i) return u(i), !1;
      var a = e.getAttribute("id");
      a && i.setAttribute("id", a);
      var p = e.getAttribute("title");
      p && i.setAttribute("title", p);
      var d = [].concat(i.getAttribute("class") || [], "injected-svg", e.getAttribute("class") || []).join(" ");
      i.setAttribute("class", r(d));
      var v = e.getAttribute("style");
      v && i.setAttribute("style", v);
      var h = [].filter.call(e.attributes, function (t) {
        return /^data-\w[\w\-]*$/.test(t.name);
      });
      o.call(h, function (t) {
        t.name && t.value && i.setAttribute(t.name, t.value);
      });
      var g,
          m,
          b,
          y,
          A,
          w = {
        clipPath: ["clip-path"],
        "color-profile": ["color-profile"],
        cursor: ["cursor"],
        filter: ["filter"],
        linearGradient: ["fill", "stroke"],
        marker: ["marker", "marker-start", "marker-mid", "marker-end"],
        mask: ["mask"],
        pattern: ["fill", "stroke"],
        radialGradient: ["fill", "stroke"]
      };
      Object.keys(w).forEach(function (t) {
        g = t, b = w[t], m = i.querySelectorAll("defs " + g + "[id]");

        for (var e = 0, r = m.length; r > e; e++) {
          y = m[e].id, A = y + "-" + l;
          var n;
          o.call(b, function (t) {
            n = i.querySelectorAll("[" + t + '*="' + y + '"]');

            for (var e = 0, r = n.length; r > e; e++) {
              n[e].setAttribute(t, "url(#" + A + ")");
            }
          }), m[e].id = A;
        }
      }), i.removeAttribute("xmlns:a");

      for (var x, S, k = i.querySelectorAll("script"), j = [], G = 0, T = k.length; T > G; G++) {
        S = k[G].getAttribute("type"), S && "application/ecmascript" !== S && "application/javascript" !== S || (x = k[G].innerText || k[G].textContent, j.push(x), i.removeChild(k[G]));
      }

      if (j.length > 0 && ("always" === n || "once" === n && !c[f])) {
        for (var M = 0, V = j.length; V > M; M++) {
          new Function(j[M])(t);
        }

        c[f] = !0;
      }

      var E = i.querySelectorAll("style");
      o.call(E, function (t) {
        t.textContent += "";
      }), e.parentNode.replaceChild(i, e), delete s[s.indexOf(e)], e = null, l++, u(i);
    }));
  },
      g = function g(t, e, r) {
    e = e || {};
    var n = e.evalScripts || "always",
        i = e.pngFallback || !1,
        a = e.each;

    if (void 0 !== t.length) {
      var l = 0;
      o.call(t, function (e) {
        h(e, n, i, function (e) {
          a && "function" == typeof a && a(e), r && t.length === ++l && r(l);
        });
      });
    } else t ? h(t, n, i, function (e) {
      a && "function" == typeof a && a(e), r && r(1), t = null;
    }) : r && r(0);
  };

  "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = exports = g : "function" == typeof define && define.amd ? define(function () {
    return g;
  }) : "object" == _typeof(t) && (t.SVGInjector = g);
}(window, document);
},{}]},{},["pLgq"], null)
//# sourceMappingURL=/svg-injector.min.5fb9c1ef.js.map