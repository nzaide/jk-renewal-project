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
})({"b0BS":[function(require,module,exports) {
/*
 Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
*/
(function () {
  var c, f;
  c = this.jQuery || window.jQuery;
  f = c(window);

  c.fn.stick_in_parent = function (b) {
    var A, w, B, n, p, J, k, E, t, K, q, L;
    null == b && (b = {});
    t = b.sticky_class;
    B = b.inner_scrolling;
    E = b.recalc_every;
    k = b.parent;
    p = b.offset_top;
    n = b.spacer;
    w = b.bottoming;
    null == p && (p = 0);
    null == k && (k = void 0);
    null == B && (B = !0);
    null == t && (t = "is_stuck");
    A = c(document);
    null == w && (w = !0);

    J = function J(a) {
      var b;
      return window.getComputedStyle ? (a = window.getComputedStyle(a[0]), b = parseFloat(a.getPropertyValue("width")) + parseFloat(a.getPropertyValue("margin-left")) + parseFloat(a.getPropertyValue("margin-right")), "border-box" !== a.getPropertyValue("box-sizing") && (b += parseFloat(a.getPropertyValue("border-left-width")) + parseFloat(a.getPropertyValue("border-right-width")) + parseFloat(a.getPropertyValue("padding-left")) + parseFloat(a.getPropertyValue("padding-right"))), b) : a.outerWidth(!0);
    };

    K = function K(a, b, q, C, F, u, r, G) {
      var v, _H, m, D, I, d, g, x, y, z, h, l;

      if (!a.data("sticky_kit")) {
        a.data("sticky_kit", !0);
        I = A.height();
        g = a.parent();
        null != k && (g = g.closest(k));
        if (!g.length) throw "failed to find stick parent";
        v = m = !1;
        (h = null != n ? n && a.closest(n) : c("<div />")) && h.css("position", a.css("position"));

        x = function x() {
          var d, f, e;
          if (!G && (I = A.height(), d = parseInt(g.css("border-top-width"), 10), f = parseInt(g.css("padding-top"), 10), b = parseInt(g.css("padding-bottom"), 10), q = g.offset().top + d + f, C = g.height(), m && (v = m = !1, null == n && (a.insertAfter(h), h.detach()), a.css({
            position: "",
            top: "",
            width: "",
            bottom: ""
          }).removeClass(t), e = !0), F = a.offset().top - (parseInt(a.css("margin-top"), 10) || 0) - p, u = a.outerHeight(!0), r = a.css("float"), h && h.css({
            width: J(a),
            height: u,
            display: a.css("display"),
            "vertical-align": a.css("vertical-align"),
            "float": r
          }), e)) return l();
        };

        x();
        if (u !== C) return D = void 0, d = p, z = E, l = function l() {
          var c, l, e, k;
          if (!G && (e = !1, null != z && (--z, 0 >= z && (z = E, x(), e = !0)), e || A.height() === I || x(), e = f.scrollTop(), null != D && (l = e - D), D = e, m ? (w && (k = e + u + d > C + q, v && !k && (v = !1, a.css({
            position: "fixed",
            bottom: "",
            top: d
          }).trigger("sticky_kit:unbottom"))), e < F && (m = !1, d = p, null == n && ("left" !== r && "right" !== r || a.insertAfter(h), h.detach()), c = {
            position: "",
            width: "",
            top: ""
          }, a.css(c).removeClass(t).trigger("sticky_kit:unstick")), B && (c = f.height(), u + p > c && !v && (d -= l, d = Math.max(c - u, d), d = Math.min(p, d), m && a.css({
            top: d + "px"
          })))) : e > F && (m = !0, c = {
            position: "fixed",
            top: d
          }, c.width = "border-box" === a.css("box-sizing") ? a.outerWidth() + "px" : a.width() + "px", a.css(c).addClass(t), null == n && (a.after(h), "left" !== r && "right" !== r || h.append(a)), a.trigger("sticky_kit:stick")), m && w && (null == k && (k = e + u + d > C + q), !v && k))) return v = !0, "static" === g.css("position") && g.css({
            position: "relative"
          }), a.css({
            position: "absolute",
            bottom: b,
            top: "auto"
          }).trigger("sticky_kit:bottom");
        }, y = function y() {
          x();
          return l();
        }, _H = function H() {
          G = !0;
          f.off("touchmove", l);
          f.off("scroll", l);
          f.off("resize", y);
          c(document.body).off("sticky_kit:recalc", y);
          a.off("sticky_kit:detach", _H);
          a.removeData("sticky_kit");
          a.css({
            position: "",
            bottom: "",
            top: "",
            width: ""
          });
          g.position("position", "");
          if (m) return null == n && ("left" !== r && "right" !== r || a.insertAfter(h), h.remove()), a.removeClass(t);
        }, f.on("touchmove", l), f.on("scroll", l), f.on("resize", y), c(document.body).on("sticky_kit:recalc", y), a.on("sticky_kit:detach", _H), setTimeout(l, 0);
      }
    };

    q = 0;

    for (L = this.length; q < L; q++) {
      b = this[q], K(c(b));
    }

    return this;
  };
}).call(this);
},{}]},{},["b0BS"], null)
//# sourceMappingURL=/sticky-kit.min.c0257bf2.js.map