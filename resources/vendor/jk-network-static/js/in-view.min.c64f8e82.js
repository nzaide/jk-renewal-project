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
})({"OMcq":[function(require,module,exports) {
var define;
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

/*!
 * in-view 0.6.1 - Get notified when a DOM element enters or exits the viewport.
 * Copyright (c) 2016 Cam Wiegert <cam@camwiegert.com> - https://camwiegert.github.io/in-view
 * License: MIT
 */
!function (t, e) {
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? exports.inView = e() : t.inView = e();
}(this, function () {
  return function (t) {
    function e(r) {
      if (n[r]) return n[r].exports;
      var i = n[r] = {
        exports: {},
        id: r,
        loaded: !1
      };
      return t[r].call(i.exports, i, i.exports, e), i.loaded = !0, i.exports;
    }

    var n = {};
    return e.m = t, e.c = n, e.p = "", e(0);
  }([function (t, e, n) {
    "use strict";

    function r(t) {
      return t && t.__esModule ? t : {
        "default": t
      };
    }

    var i = n(2),
        o = r(i);
    t.exports = o["default"];
  }, function (t, e) {
    function n(t) {
      var e = _typeof(t);

      return null != t && ("object" == e || "function" == e);
    }

    t.exports = n;
  }, function (t, e, n) {
    "use strict";

    function r(t) {
      return t && t.__esModule ? t : {
        "default": t
      };
    }

    Object.defineProperty(e, "__esModule", {
      value: !0
    });

    var i = n(9),
        o = r(i),
        u = n(3),
        f = r(u),
        s = n(4),
        c = function c() {
      if ("undefined" != typeof window) {
        var t = 100,
            e = ["scroll", "resize", "load"],
            n = {
          history: []
        },
            r = {
          offset: {},
          threshold: 0,
          test: s.inViewport
        },
            i = (0, o["default"])(function () {
          n.history.forEach(function (t) {
            n[t].check();
          });
        }, t);
        e.forEach(function (t) {
          return addEventListener(t, i);
        }), window.MutationObserver && addEventListener("DOMContentLoaded", function () {
          new MutationObserver(i).observe(document.body, {
            attributes: !0,
            childList: !0,
            subtree: !0
          });
        });

        var u = function u(t) {
          if ("string" == typeof t) {
            var e = [].slice.call(document.querySelectorAll(t));
            return n.history.indexOf(t) > -1 ? n[t].elements = e : (n[t] = (0, f["default"])(e, r), n.history.push(t)), n[t];
          }
        };

        return u.offset = function (t) {
          if (void 0 === t) return r.offset;

          var e = function e(t) {
            return "number" == typeof t;
          };

          return ["top", "right", "bottom", "left"].forEach(e(t) ? function (e) {
            return r.offset[e] = t;
          } : function (n) {
            return e(t[n]) ? r.offset[n] = t[n] : null;
          }), r.offset;
        }, u.threshold = function (t) {
          return "number" == typeof t && t >= 0 && t <= 1 ? r.threshold = t : r.threshold;
        }, u.test = function (t) {
          return "function" == typeof t ? r.test = t : r.test;
        }, u.is = function (t) {
          return r.test(t, r);
        }, u.offset(0), u;
      }
    };

    e["default"] = c();
  }, function (t, e) {
    "use strict";

    function n(t, e) {
      if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
    }

    Object.defineProperty(e, "__esModule", {
      value: !0
    });

    var r = function () {
      function t(t, e) {
        for (var n = 0; n < e.length; n++) {
          var r = e[n];
          r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r);
        }
      }

      return function (e, n, r) {
        return n && t(e.prototype, n), r && t(e, r), e;
      };
    }(),
        i = function () {
      function t(e, r) {
        n(this, t), this.options = r, this.elements = e, this.current = [], this.handlers = {
          enter: [],
          exit: []
        }, this.singles = {
          enter: [],
          exit: []
        };
      }

      return r(t, [{
        key: "check",
        value: function value() {
          var t = this;
          return this.elements.forEach(function (e) {
            var n = t.options.test(e, t.options),
                r = t.current.indexOf(e),
                i = r > -1,
                o = n && !i,
                u = !n && i;
            o && (t.current.push(e), t.emit("enter", e)), u && (t.current.splice(r, 1), t.emit("exit", e));
          }), this;
        }
      }, {
        key: "on",
        value: function value(t, e) {
          return this.handlers[t].push(e), this;
        }
      }, {
        key: "once",
        value: function value(t, e) {
          return this.singles[t].unshift(e), this;
        }
      }, {
        key: "emit",
        value: function value(t, e) {
          for (; this.singles[t].length;) {
            this.singles[t].pop()(e);
          }

          for (var n = this.handlers[t].length; --n > -1;) {
            this.handlers[t][n](e);
          }

          return this;
        }
      }]), t;
    }();

    e["default"] = function (t, e) {
      return new i(t, e);
    };
  }, function (t, e) {
    "use strict";

    function n(t, e) {
      var n = t.getBoundingClientRect(),
          r = n.top,
          i = n.right,
          o = n.bottom,
          u = n.left,
          f = n.width,
          s = n.height,
          c = {
        t: o,
        r: window.innerWidth - u,
        b: window.innerHeight - r,
        l: i
      },
          a = {
        x: e.threshold * f,
        y: e.threshold * s
      };
      return c.t > e.offset.top + a.y && c.r > e.offset.right + a.x && c.b > e.offset.bottom + a.y && c.l > e.offset.left + a.x;
    }

    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e.inViewport = n;
  }, function (t, e) {
    (function (e) {
      var n = "object" == _typeof(e) && e && e.Object === Object && e;
      t.exports = n;
    }).call(e, function () {
      return this;
    }());
  }, function (t, e, n) {
    var r = n(5),
        i = "object" == (typeof self === "undefined" ? "undefined" : _typeof(self)) && self && self.Object === Object && self,
        o = r || i || Function("return this")();
    t.exports = o;
  }, function (t, e, n) {
    function r(t, e, n) {
      function r(e) {
        var n = x,
            r = m;
        return x = m = void 0, E = e, w = t.apply(r, n);
      }

      function a(t) {
        return E = t, j = setTimeout(h, e), M ? r(t) : w;
      }

      function l(t) {
        var n = t - O,
            r = t - E,
            i = e - n;
        return _ ? c(i, g - r) : i;
      }

      function d(t) {
        var n = t - O,
            r = t - E;
        return void 0 === O || n >= e || n < 0 || _ && r >= g;
      }

      function h() {
        var t = o();
        return d(t) ? p(t) : void (j = setTimeout(h, l(t)));
      }

      function p(t) {
        return j = void 0, T && x ? r(t) : (x = m = void 0, w);
      }

      function v() {
        void 0 !== j && clearTimeout(j), E = 0, x = O = m = j = void 0;
      }

      function y() {
        return void 0 === j ? w : p(o());
      }

      function b() {
        var t = o(),
            n = d(t);

        if (x = arguments, m = this, O = t, n) {
          if (void 0 === j) return a(O);
          if (_) return j = setTimeout(h, e), r(O);
        }

        return void 0 === j && (j = setTimeout(h, e)), w;
      }

      var x,
          m,
          g,
          w,
          j,
          O,
          E = 0,
          M = !1,
          _ = !1,
          T = !0;

      if ("function" != typeof t) throw new TypeError(f);
      return e = u(e) || 0, i(n) && (M = !!n.leading, _ = "maxWait" in n, g = _ ? s(u(n.maxWait) || 0, e) : g, T = "trailing" in n ? !!n.trailing : T), b.cancel = v, b.flush = y, b;
    }

    var i = n(1),
        o = n(8),
        u = n(10),
        f = "Expected a function",
        s = Math.max,
        c = Math.min;
    t.exports = r;
  }, function (t, e, n) {
    var r = n(6),
        i = function i() {
      return r.Date.now();
    };

    t.exports = i;
  }, function (t, e, n) {
    function r(t, e, n) {
      var r = !0,
          f = !0;
      if ("function" != typeof t) throw new TypeError(u);
      return o(n) && (r = "leading" in n ? !!n.leading : r, f = "trailing" in n ? !!n.trailing : f), i(t, e, {
        leading: r,
        maxWait: e,
        trailing: f
      });
    }

    var i = n(7),
        o = n(1),
        u = "Expected a function";
    t.exports = r;
  }, function (t, e) {
    function n(t) {
      return t;
    }

    t.exports = n;
  }]);
});
},{}]},{},["OMcq"], null)
//# sourceMappingURL=/in-view.min.c64f8e82.js.map