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
})({"js/components/animaPeek.ts":[function(require,module,exports) {
"use strict";
/**
* Animation - peek text
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var animaPeek = function animaPeek() {
  var animated = document.querySelectorAll('.js-anima-peek');

  if (animated) {
    animated.forEach(function (anima) {
      var wraps = anima.querySelectorAll('.anima-wrap');
      var delay = 0;

      for (var i = 1; i < wraps.length; i++) {
        var obj = wraps[i].firstElementChild;
        delay += 0.5;
        var delayStr = delay + 's';

        if (obj) {
          obj.setAttribute('style', 'transition-delay: ' + delayStr + ';');
        }
      } //@ts-ignore


      var controller = new ScrollMagic.Controller({
        addIndicators: true
      }); //@ts-ignore

      var scene = new ScrollMagic.Scene({
        triggerElement: anima
      }).addTo(controller);
      scene.on('enter', function () {
        wraps.forEach(function (wrap) {
          wrap.classList.add('show');
        });
      });
      scene.triggerHook(0.6);
    });
  }
};

exports.default = animaPeek;
},{}],"js/components/forEachPolyfill.ts":[function(require,module,exports) {
"use strict";
/**
* Foreach polyfill for browsers
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var foreachPolyfill = function foreachPolyfill() {
  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
      thisArg = thisArg || window;

      for (var i = 0; i < this.length; i++) {
        callback.call(thisArg, this[i], i, this);
      }
    };
  }
};

exports.default = foreachPolyfill;
},{}],"js/components/search.ts":[function(require,module,exports) {
"use strict";
/**
* Search
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var search = function search() {
  var trigger = document.querySelector('.js-searchsticky');
  var search = document.querySelector('.js-search');

  if (search) {
    var toggle = search.querySelector('.js-search-toggle');
    toggle === null || toggle === void 0 ? void 0 : toggle.addEventListener('click', function () {
      toggle === null || toggle === void 0 ? void 0 : toggle.classList.toggle('active');
    }); //@ts-ignore

    var controller = new ScrollMagic.Controller({
      addIndicators: true
    }); //@ts-ignore

    var scene = new ScrollMagic.Scene({
      triggerElement: trigger
    }).addTo(controller);
    scene.on('enter', function () {
      search.classList.add('sticky');
    });
    scene.on('leave', function () {
      search.classList.remove('sticky');
    });
    scene.triggerHook(0.2);
  }
};

exports.default = search;
},{}],"vQ81":[function(require,module,exports) {
"use strict";
/**
* Flickity
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var slider = function slider() {
  var mv = document.querySelector('.js-slider-mv');

  if (mv) {
    //@ts-ignore
    new Flickity(mv, {
      adaptiveHeight: true,
      wrapAround: true,
      autoPlay: 5000,
      contain: true,
      fade: true,
      prevNextButtons: false,
      pauseAutoPlayOnHover: true
    });
  }

  var jobs = document.querySelector('.js-slider-jobs');

  if (jobs) {
    //@ts-ignore
    new Flickity(jobs, {
      watchCSS: true,
      adaptiveHeight: true,
      wrapAround: true,
      contain: true,
      fade: true,
      prevNextButtons: false
    });
  }

  var voice = document.querySelector('.js-slider-voice');

  if (voice) {
    //@ts-ignore
    new Flickity(voice, {
      cellAlign: 'left',
      adaptiveHeight: true,
      wrapAround: true,
      contain: true,
      prevNextButtons: false,
      groupCells: true
    });
  }

  var awards = document.querySelector('.js-slider-awards');

  if (awards) {
    //@ts-ignore
    new Flickity(awards, {
      wrapAround: true,
      autoPlay: 3000,
      contain: true,
      fade: true,
      pauseAutoPlayOnHover: true
    });
  }
};

exports.default = slider;
},{}],"js/components/smoothScroll.ts":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
/**
 * Smooth scroll
 */

var smoothScroll = function smoothScroll() {
  var anchorLink = document.querySelectorAll("a[href^='#']");
  anchorLink.forEach(function (item) {
    item.addEventListener('click', function (elem) {
      elem.preventDefault();
      var elemTarget = item;
      var elemAnchor = document.querySelector(elemTarget.getAttribute('href') || '');

      if (elemAnchor) {
        elemAnchor.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });
};

exports.default = smoothScroll;
},{}],"js/components/animaCounter.ts":[function(require,module,exports) {
"use strict";
/**
* Animation - odometer counter
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var animaCounter = function animaCounter() {
  var animated = document.querySelectorAll('.js-anima-counter');

  if (animated) {
    animated.forEach(function (anima) {
      var counters = anima.querySelectorAll('.js-counter');
      var speed = 200;

      function animaCount(obj, start, end, duration) {
        var current = start,
            range = end - start,
            increment = end > start ? 1 : -1,
            step = Math.abs(Math.floor(duration / range)),
            timer = setInterval(function () {
          current += increment;
          obj.textContent = current.toString();

          if (current == end) {
            clearInterval(timer);
          }
        }, step);
      } //@ts-ignore


      var controller = new ScrollMagic.Controller({
        addIndicators: true
      }); //@ts-ignore

      var scene = new ScrollMagic.Scene({
        triggerElement: anima
      }).addTo(controller);
      scene.on('enter', function () {
        if (counters) {
          counters.forEach(function (counter) {
            var end = +counter.getAttribute('data-end');
            var start = +counter.getAttribute('data-start');
            var duration = +counter.getAttribute('data-duration');
            animaCount(counter, start, end, duration);
          });
        }
      });
      scene.triggerHook(0.7);
    });
  }
};

exports.default = animaCounter;
},{}],"js/components/header.ts":[function(require,module,exports) {
"use strict";
/**
* Header
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var header = function header() {
  var header = document.querySelector('header');

  if (header) {
    var scrolled = function scrolled() {
      if (window.pageYOffset > 200) {
        header === null || header === void 0 ? void 0 : header.classList.add('scrolled');
      } else {
        header === null || header === void 0 ? void 0 : header.classList.remove('scrolled');
      }
    };

    scrolled();
    window.addEventListener('scroll', function () {
      scrolled();
    }, {
      passive: true
    });
  }
};

exports.default = header;
},{}],"js/components/yt.ts":[function(require,module,exports) {
"use strict";
/**
* YT
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var yt = function yt() {
  var vids = document.querySelectorAll('.js-yt');

  function fetchTitle(videoID, title) {
    var id = videoID;
    var url = 'https://www.youtube.com/watch?v=' + id; //@ts-ignore

    $.getJSON('https://noembed.com/embed', //@ts-ignore
    {
      format: 'json',
      url: url
    }, function (data) {
      title.textContent = data.title;
    });
  }

  if (vids) {
    vids.forEach(function (vid) {
      var id = vid === null || vid === void 0 ? void 0 : vid.getAttribute('data-id');
      var title = vid.querySelector('.top__yt-title');

      if (id) {
        fetchTitle(id, title);
      }
    });
  }
};

exports.default = yt;
},{}],"js/components/animaFade.ts":[function(require,module,exports) {
"use strict";
/**
* Animation - fade-up bounce
*/

Object.defineProperty(exports, "__esModule", {
  value: true
});

var animaFade = function animaFade() {
  var animated = document.querySelectorAll('.js-anima-fade');

  if (animated) {
    animated.forEach(function (anima) {
      var objs = anima.querySelectorAll('.anima-fade'); //@ts-ignore

      var controller = new ScrollMagic.Controller({
        addIndicators: true
      }); //@ts-ignore

      var scene = new ScrollMagic.Scene({
        triggerElement: anima
      }).addTo(controller);
      scene.on('enter', function () {
        objs.forEach(function (obj) {
          obj.classList.add('viewed');
        });
      });
      scene.triggerHook(0.9);
    });
  }
};

exports.default = animaFade;
},{}],"js/index.ts":[function(require,module,exports) {
"use strict";

var __importDefault = this && this.__importDefault || function (mod) {
  return mod && mod.__esModule ? mod : {
    "default": mod
  };
};

Object.defineProperty(exports, "__esModule", {
  value: true
});

var animaPeek_1 = __importDefault(require("./components/animaPeek"));

var forEachPolyfill_1 = __importDefault(require("./components/forEachPolyfill"));

var search_1 = __importDefault(require("./components/search"));

var slider_1 = __importDefault(require("./components/slider"));

var smoothScroll_1 = __importDefault(require("./components/smoothScroll"));

var animaCounter_1 = __importDefault(require("./components/animaCounter"));

var header_1 = __importDefault(require("./components/header"));

var yt_1 = __importDefault(require("./components/yt"));

var animaFade_1 = __importDefault(require("./components/animaFade"));

document.addEventListener('DOMContentLoaded', function () {
  (0, forEachPolyfill_1.default)();
  (0, smoothScroll_1.default)();
  (0, header_1.default)();
  (0, search_1.default)();
  (0, slider_1.default)();
  (0, animaPeek_1.default)();
  (0, animaCounter_1.default)();
  (0, animaFade_1.default)();
  (0, yt_1.default)();
}, false);
},{"./components/animaPeek":"js/components/animaPeek.ts","./components/forEachPolyfill":"js/components/forEachPolyfill.ts","./components/search":"js/components/search.ts","./components/slider":"vQ81","./components/smoothScroll":"js/components/smoothScroll.ts","./components/animaCounter":"js/components/animaCounter.ts","./components/header":"js/components/header.ts","./components/yt":"js/components/yt.ts","./components/animaFade":"js/components/animaFade.ts"}]},{},["js/index.ts"], null)
