/* VelocityJS.org UI Pack (5.0.4). (C) 2014 Julian Shapiro. MIT @license: en.wikipedia.org/wiki/MIT_License. Portions copyright Daniel Eden, Christian Pucci. */ ! function(t) {
    "function" == typeof require && "object" == typeof exports ? module.exports = t() : "function" == typeof define && define.amd ? define(["velocity"], t) : t()
}(function() {
    return function(t, a, e, r) {
        function n(t, a) {
            var e = [];
            return t && a ? ($.each([t, a], function(t, a) {
                var r = [];
                $.each(a, function(t, a) {
                    for (; a.toString().length < 5;) a = "0" + a;
                    r.push(a)
                }), e.push(r.join(""))
            }), parseFloat(e[0]) > parseFloat(e[1])) : !1
        }
        if (!t.Velocity || !t.Velocity.Utilities) return void(a.console && console.log("Velocity UI Pack: Velocity must be loaded first. Aborting."));
        var i = t.Velocity,
            $ = i.Utilities,
            s = i.version,
            o = {
                major: 1,
                minor: 1,
                patch: 0
            };
        if (n(o, s)) {
            var l = "Velocity UI Pack: You need to update Velocity (jquery.velocity.js) to a newer version. Visit http://github.com/julianshapiro/velocity.";
            throw alert(l), new Error(l)
        }
        i.RegisterEffect = i.RegisterUI = function(t, a) {
            function e(t, a, e, r) {
                var n = 0,
                    s;
                $.each(t.nodeType ? [t] : t, function(t, a) {
                    r && (e += t * r), s = a.parentNode, $.each(["height", "paddingTop", "paddingBottom", "marginTop", "marginBottom"], function(t, e) {
                        n += parseFloat(i.CSS.getPropertyValue(a, e))
                    })
                }), i.animate(s, {
                    height: ("In" === a ? "+" : "-") + "=" + n
                }, {
                    queue: !1,
                    easing: "ease-in-out",
                    duration: e * ("In" === a ? .6 : 1)
                })
            }
            return i.Redirects[t] = function(n, s, o, l, c, u) {
                function f() {
                    s.display !== r && "none" !== s.display || !/Out$/.test(t) || $.each(c.nodeType ? [c] : c, function(t, a) {
                        i.CSS.setPropertyValue(a, "display", "none")
                    }), s.complete && s.complete.call(c, c), u && u.resolver(c || n)
                }
                var p = o === l - 1;
                a.defaultDuration = "function" == typeof a.defaultDuration ? a.defaultDuration.call(c, c) : parseFloat(a.defaultDuration);
                for (var d = 0; d < a.calls.length; d++) {
                    var g = a.calls[d],
                        y = g[0],
                        m = s.duration || a.defaultDuration || 1e3,
                        X = g[1],
                        Y = g[2] || {},
                        O = {};
                    if (O.duration = m * (X || 1), O.queue = s.queue || "", O.easing = Y.easing || "ease", O.delay = parseFloat(Y.delay) || 0, O._cacheValues = Y._cacheValues || !0, 0 === d) {
                        if (O.delay += parseFloat(s.delay) || 0, 0 === o && (O.begin = function() {
                            s.begin && s.begin.call(c, c);
                            var a = t.match(/(In|Out)$/);
                            a && "In" === a[0] && y.opacity !== r && $.each(c.nodeType ? [c] : c, function(t, a) {
                                i.CSS.setPropertyValue(a, "opacity", 0)
                            }), s.animateParentHeight && a && e(c, a[0], m + O.delay, s.stagger)
                        }), null !== s.display)
                            if (s.display !== r && "none" !== s.display) O.display = s.display;
                            else if (/In$/.test(t)) {
                                var v = i.CSS.Values.getDisplayType(n);
                                O.display = "inline" === v ? "inline-block" : v
                            }
                        s.visibility && "hidden" !== s.visibility && (O.visibility = s.visibility)
                    }
                    d === a.calls.length - 1 && (O.complete = function() {
                        if (a.reset) {
                            for (var t in a.reset) {
                                var e = a.reset[t];
                                i.CSS.Hooks.registered[t] !== r || "string" != typeof e && "number" != typeof e || (a.reset[t] = [a.reset[t], a.reset[t]])
                            }
                            var s = {
                                duration: 0,
                                queue: !1
                            };
                            p && (s.complete = f), i.animate(n, a.reset, s)
                        } else p && f()
                    }, "hidden" === s.visibility && (O.visibility = s.visibility)), i.animate(n, y, O)
                }
            }, i
        }, i.RegisterEffect.packagedEffects = {
            "callout.bounce": {
                defaultDuration: 550,
                calls: [
                    [{
                        translateY: -30
                    }, .25],
                    [{
                        translateY: 0
                    }, .125],
                    [{
                        translateY: -15
                    }, .125],
                    [{
                        translateY: 0
                    }, .25]
                ]
            },
            "callout.shake": {
                defaultDuration: 800,
                calls: [
                    [{
                        translateX: -11
                    }, .125],
                    [{
                        translateX: 11
                    }, .125],
                    [{
                        translateX: -11
                    }, .125],
                    [{
                        translateX: 11
                    }, .125],
                    [{
                        translateX: -11
                    }, .125],
                    [{
                        translateX: 11
                    }, .125],
                    [{
                        translateX: -11
                    }, .125],
                    [{
                        translateX: 0
                    }, .125]
                ]
            },
            "callout.flash": {
                defaultDuration: 1100,
                calls: [
                    [{
                        opacity: [0, "easeInOutQuad", 1]
                    }, .25],
                    [{
                        opacity: [1, "easeInOutQuad"]
                    }, .25],
                    [{
                        opacity: [0, "easeInOutQuad"]
                    }, .25],
                    [{
                        opacity: [1, "easeInOutQuad"]
                    }, .25]
                ]
            },
            "callout.pulse": {
                defaultDuration: 825,
                calls: [
                    [{
                        scaleX: 1.1,
                        scaleY: 1.1
                    }, .5, {
                        easing: "easeInExpo"
                    }],
                    [{
                        scaleX: 1,
                        scaleY: 1
                    }, .5]
                ]
            },
            "callout.swing": {
                defaultDuration: 950,
                calls: [
                    [{
                        rotateZ: 15
                    }, .2],
                    [{
                        rotateZ: -10
                    }, .2],
                    [{
                        rotateZ: 5
                    }, .2],
                    [{
                        rotateZ: -5
                    }, .2],
                    [{
                        rotateZ: 0
                    }, .2]
                ]
            },
            "callout.tada": {
                defaultDuration: 1e3,
                calls: [
                    [{
                        scaleX: .9,
                        scaleY: .9,
                        rotateZ: -3
                    }, .1],
                    [{
                        scaleX: 1.1,
                        scaleY: 1.1,
                        rotateZ: 3
                    }, .1],
                    [{
                        scaleX: 1.1,
                        scaleY: 1.1,
                        rotateZ: -3
                    }, .1],
                    ["reverse", .125],
                    ["reverse", .125],
                    ["reverse", .125],
                    ["reverse", .125],
                    ["reverse", .125],
                    [{
                        scaleX: 1,
                        scaleY: 1,
                        rotateZ: 0
                    }, .2]
                ]
            },
            "transition.fadeIn": {
                defaultDuration: 500,
                calls: [
                    [{
                        opacity: [1, 0]
                    }]
                ]
            },
            "transition.fadeOut": {
                defaultDuration: 500,
                calls: [
                    [{
                        opacity: [0, 1]
                    }]
                ]
            },
            "transition.flipXIn": {
                defaultDuration: 700,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [800, 800],
                        rotateY: [0, -55]
                    }]
                ],
                reset: {
                    transformPerspective: 0
                }
            },
            "transition.flipXOut": {
                defaultDuration: 700,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [800, 800],
                        rotateY: 55
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    rotateY: 0
                }
            },
            "transition.flipYIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [800, 800],
                        rotateX: [0, -45]
                    }]
                ],
                reset: {
                    transformPerspective: 0
                }
            },
            "transition.flipYOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [800, 800],
                        rotateX: 25
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    rotateX: 0
                }
            },
            "transition.flipBounceXIn": {
                defaultDuration: 900,
                calls: [
                    [{
                        opacity: [.725, 0],
                        transformPerspective: [400, 400],
                        rotateY: [-10, 90]
                    }, .5],
                    [{
                        opacity: .8,
                        rotateY: 10
                    }, .25],
                    [{
                        opacity: 1,
                        rotateY: 0
                    }, .25]
                ],
                reset: {
                    transformPerspective: 0
                }
            },
            "transition.flipBounceXOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [.9, 1],
                        transformPerspective: [400, 400],
                        rotateY: -10
                    }, .5],
                    [{
                        opacity: 0,
                        rotateY: 90
                    }, .5]
                ],
                reset: {
                    transformPerspective: 0,
                    rotateY: 0
                }
            },
            "transition.flipBounceYIn": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [.725, 0],
                        transformPerspective: [400, 400],
                        rotateX: [-10, 90]
                    }, .5],
                    [{
                        opacity: .8,
                        rotateX: 10
                    }, .25],
                    [{
                        opacity: 1,
                        rotateX: 0
                    }, .25]
                ],
                reset: {
                    transformPerspective: 0
                }
            },
            "transition.flipBounceYOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [.9, 1],
                        transformPerspective: [400, 400],
                        rotateX: -15
                    }, .5],
                    [{
                        opacity: 0,
                        rotateX: 90
                    }, .5]
                ],
                reset: {
                    transformPerspective: 0,
                    rotateX: 0
                }
            },
            "transition.swoopIn": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformOriginX: ["100%", "50%"],
                        transformOriginY: ["100%", "100%"],
                        scaleX: [1, 0],
                        scaleY: [1, 0],
                        translateX: [0, -700],
                        translateZ: 0
                    }]
                ],
                reset: {
                    transformOriginX: "50%",
                    transformOriginY: "50%"
                }
            },
            "transition.swoopOut": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformOriginX: ["50%", "100%"],
                        transformOriginY: ["100%", "100%"],
                        scaleX: 0,
                        scaleY: 0,
                        translateX: -700,
                        translateZ: 0
                    }]
                ],
                reset: {
                    transformOriginX: "50%",
                    transformOriginY: "50%",
                    scaleX: 1,
                    scaleY: 1,
                    translateX: 0
                }
            },
            "transition.whirlIn": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: [1, 0],
                        scaleY: [1, 0],
                        rotateY: [0, 160]
                    }, 1, {
                        easing: "easeInOutSine"
                    }]
                ]
            },
            "transition.whirlOut": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [0, "easeInOutQuint", 1],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: 0,
                        scaleY: 0,
                        rotateY: 160
                    }, 1, {
                        easing: "swing"
                    }]
                ],
                reset: {
                    scaleX: 1,
                    scaleY: 1,
                    rotateY: 0
                }
            },
            "transition.shrinkIn": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: [1, 1.5],
                        scaleY: [1, 1.5],
                        translateZ: 0
                    }]
                ]
            },
            "transition.shrinkOut": {
                defaultDuration: 600,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: 1.3,
                        scaleY: 1.3,
                        translateZ: 0
                    }]
                ],
                reset: {
                    scaleX: 1,
                    scaleY: 1
                }
            },
            "transition.expandIn": {
                defaultDuration: 700,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: [1, .625],
                        scaleY: [1, .625],
                        translateZ: 0
                    }]
                ]
            },
            "transition.expandOut": {
                defaultDuration: 700,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformOriginX: ["50%", "50%"],
                        transformOriginY: ["50%", "50%"],
                        scaleX: .5,
                        scaleY: .5,
                        translateZ: 0
                    }]
                ],
                reset: {
                    scaleX: 1,
                    scaleY: 1
                }
            },
            "transition.bounceIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        scaleX: [1.05, .3],
                        scaleY: [1.05, .3]
                    }, .4],
                    [{
                        scaleX: .9,
                        scaleY: .9,
                        translateZ: 0
                    }, .2],
                    [{
                        scaleX: 1,
                        scaleY: 1
                    }, .5]
                ]
            },
            "transition.bounceOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        scaleX: .95,
                        scaleY: .95
                    }, .35],
                    [{
                        scaleX: 1.1,
                        scaleY: 1.1,
                        translateZ: 0
                    }, .35],
                    [{
                        opacity: [0, 1],
                        scaleX: .3,
                        scaleY: .3
                    }, .3]
                ],
                reset: {
                    scaleX: 1,
                    scaleY: 1
                }
            },
            "transition.bounceUpIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [-30, 1e3]
                    }, .6, {
                        easing: "easeOutCirc"
                    }],
                    [{
                        translateY: 10
                    }, .2],
                    [{
                        translateY: 0
                    }, .2]
                ]
            },
            "transition.bounceUpOut": {
                defaultDuration: 1e3,
                calls: [
                    [{
                        translateY: 20
                    }, .2],
                    [{
                        opacity: [0, "easeInCirc", 1],
                        translateY: -1e3
                    }, .8]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.bounceDownIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [30, -1e3]
                    }, .6, {
                        easing: "easeOutCirc"
                    }],
                    [{
                        translateY: -10
                    }, .2],
                    [{
                        translateY: 0
                    }, .2]
                ]
            },
            "transition.bounceDownOut": {
                defaultDuration: 1e3,
                calls: [
                    [{
                        translateY: -20
                    }, .2],
                    [{
                        opacity: [0, "easeInCirc", 1],
                        translateY: 1e3
                    }, .8]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.bounceLeftIn": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [30, -1250]
                    }, .6, {
                        easing: "easeOutCirc"
                    }],
                    [{
                        translateX: -10
                    }, .2],
                    [{
                        translateX: 0
                    }, .2]
                ]
            },
            "transition.bounceLeftOut": {
                defaultDuration: 750,
                calls: [
                    [{
                        translateX: 30
                    }, .2],
                    [{
                        opacity: [0, "easeInCirc", 1],
                        translateX: -1250
                    }, .8]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.bounceRightIn": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [-30, 1250]
                    }, .6, {
                        easing: "easeOutCirc"
                    }],
                    [{
                        translateX: 10
                    }, .2],
                    [{
                        translateX: 0
                    }, .2]
                ]
            },
            "transition.bounceRightOut": {
                defaultDuration: 750,
                calls: [
                    [{
                        translateX: -30
                    }, .2],
                    [{
                        opacity: [0, "easeInCirc", 1],
                        translateX: 1250
                    }, .8]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.slideUpIn": {
                defaultDuration: 900,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [0, 20],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideUpOut": {
                defaultDuration: 900,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateY: -20,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.slideDownIn": {
                defaultDuration: 900,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [0, -20],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideDownOut": {
                defaultDuration: 900,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateY: 20,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.slideLeftIn": {
                defaultDuration: 1e3,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [0, -20],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideLeftOut": {
                defaultDuration: 1050,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateX: -20,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.slideRightIn": {
                defaultDuration: 1e3,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [0, 20],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideRightOut": {
                defaultDuration: 1050,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateX: 20,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.slideUpBigIn": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [0, 75],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideUpBigOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateY: -75,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.slideDownBigIn": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateY: [0, -75],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideDownBigOut": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateY: 75,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateY: 0
                }
            },
            "transition.slideLeftBigIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [0, -75],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideLeftBigOut": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateX: -75,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.slideRightBigIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        translateX: [0, 75],
                        translateZ: 0
                    }]
                ]
            },
            "transition.slideRightBigOut": {
                defaultDuration: 750,
                calls: [
                    [{
                        opacity: [0, 1],
                        translateX: 75,
                        translateZ: 0
                    }]
                ],
                reset: {
                    translateX: 0
                }
            },
            "transition.perspectiveUpIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [800, 800],
                        transformOriginX: [0, 0],
                        transformOriginY: ["100%", "100%"],
                        rotateX: [0, -180]
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%"
                }
            },
            "transition.perspectiveUpOut": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [800, 800],
                        transformOriginX: [0, 0],
                        transformOriginY: ["100%", "100%"],
                        rotateX: -180
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%",
                    rotateX: 0
                }
            },
            "transition.perspectiveDownIn": {
                defaultDuration: 800,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [800, 800],
                        transformOriginX: [0, 0],
                        transformOriginY: [0, 0],
                        rotateX: [0, 180]
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%"
                }
            },
            "transition.perspectiveDownOut": {
                defaultDuration: 850,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [800, 800],
                        transformOriginX: [0, 0],
                        transformOriginY: [0, 0],
                        rotateX: 180
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%",
                    rotateX: 0
                }
            },
            "transition.perspectiveLeftIn": {
                defaultDuration: 950,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [2e3, 2e3],
                        transformOriginX: [0, 0],
                        transformOriginY: [0, 0],
                        rotateY: [0, -180]
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%"
                }
            },
            "transition.perspectiveLeftOut": {
                defaultDuration: 950,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [2e3, 2e3],
                        transformOriginX: [0, 0],
                        transformOriginY: [0, 0],
                        rotateY: -180
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%",
                    rotateY: 0
                }
            },
            "transition.perspectiveRightIn": {
                defaultDuration: 950,
                calls: [
                    [{
                        opacity: [1, 0],
                        transformPerspective: [2e3, 2e3],
                        transformOriginX: ["100%", "100%"],
                        transformOriginY: [0, 0],
                        rotateY: [0, 180]
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%"
                }
            },
            "transition.perspectiveRightOut": {
                defaultDuration: 950,
                calls: [
                    [{
                        opacity: [0, 1],
                        transformPerspective: [2e3, 2e3],
                        transformOriginX: ["100%", "100%"],
                        transformOriginY: [0, 0],
                        rotateY: 180
                    }]
                ],
                reset: {
                    transformPerspective: 0,
                    transformOriginX: "50%",
                    transformOriginY: "50%",
                    rotateY: 0
                }
            },
            "transition.zoomIn": {
                defaultDuration: 1000,
                calls: [
                    [{
                        opacity:    [1, 0],
                        scaleX:     [1, 0.5],
                        scaleY:     [1, 0.5],
                    }]
                ],
            },
            "transition.slideInRightVeryBig": {
                defaultDuration: 1000,
                calls: [
                    [{
                        opacity:                [1, 0],
                        translateX:             [0, 300],
                        translateY:             [0,0]
                    }]
                ],
            },
            "transition.slideInLeftVeryBig": {
                defaultDuration: 1000,
                calls: [
                    [{
                        opacity:                [1, 0],
                        translateX:             [0, -335],
                        translateY:             [0,0]
                    }]
                ],
            },

            "transition.raise":{
                defaultDuration:600,
                calls: [
                    [{
                        opacity:[1,0],
                        transformOriginX:["50%","50%"],
                        transformOriginY:["50%","50%"],
                        scaleX:[1,.2],
                        scaleY:[1,.2],
                        translateZ:0}]
                ]},

        };
        for (var c in i.RegisterEffect.packagedEffects) i.RegisterEffect(c, i.RegisterEffect.packagedEffects[c]);
        i.RunSequence = function(t) {
            var a = $.extend(!0, [], t);
            a.length > 1 && ($.each(a.reverse(), function(t, e) {
                var r = a[t + 1];
                if (r) {
                    var n = e.o || e.options,
                        s = r.o || r.options,
                        o = n && n.sequenceQueue === !1 ? "begin" : "complete",
                        l = s && s[o],
                        c = {};
                    c[o] = function() {
                        var t = r.e || r.elements,
                            a = t.nodeType ? [t] : t;
                        l && l.call(a, a), i(e)
                    }, r.o ? r.o = $.extend({}, s, c) : r.options = $.extend({}, s, c)
                }
            }), a.reverse()), i(a[0])
        }
    }(window.jQuery || window.Zepto || window, window, document)
});
// update: 2025-07-24T09:07:38.441447

// update: 2025-07-24T09:07:47.418917
