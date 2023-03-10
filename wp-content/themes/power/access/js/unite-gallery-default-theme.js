function UGTheme_default() {
  function e(e, t) {
    (P = e),
      (R = jQuery.extend(R, z)),
      (R = jQuery.extend(R, t)),
      (R = jQuery.extend(R, j)),
      n(),
      P.setOptions(R),
      1 == R.theme_load_panel && ((w = new UGStripPanel()), w.init(e, R)),
      1 == R.theme_load_slider && P.initSlider(R),
      (x = e.getObjects()),
      (v = jQuery(e)),
      (E = x.g_objWrapper),
      1 == R.theme_load_slider && (T = x.g_objSlider),
      1 == R.theme_enable_text_panel &&
        ((I = new UGTextPanel()), I.init(P, R, "slider"));
  }
  function t() {
    l(), i(), b();
  }
  function n() {
    var e = {
      slider_textpanel_css_title: {},
      slider_textpanel_css_description: {},
    };
    switch (
      ((R = jQuery.extend(e, R)),
      (R.slider_textpanel_css_title["text-align"] = R.theme_text_align),
      (R.slider_textpanel_css_description["text-align"] = R.theme_text_align),
      R.theme_text_type)
    ) {
      case "title":
        (R.slider_textpanel_enable_title = !0),
          (R.slider_textpanel_enable_description = !1);
        break;
      case "both":
        (R.slider_textpanel_enable_title = !0),
          (R.slider_textpanel_enable_description = !0);
        break;
      default:
      case "description":
    }
  }
  function l() {
    E.addClass("ug-theme-default");
    var e = "";
    e += "<div class='ug-theme-panel'>";
    var t = "ug-default-button-fullscreen",
      n = "ug-default-button-play",
      l = ".ug-default-button-fullscreen",
      i = ".ug-default-button-play";
    I ||
      ((t = "ug-default-button-fullscreen-single"),
      (n = "ug-default-button-play-single"),
      (l = ".ug-default-button-fullscreen-single"),
      (i = ".ug-default-button-play-single")),
      1 == R.theme_enable_fullscreen_button &&
        (e += "<div class='" + t + "'></div>"),
      1 == R.theme_enable_play_button && (e += "<div class='" + n + "'></div>"),
      R.theme_enable_hidepanel_button &&
        (e +=
          "<div class='ug-default-button-hidepanel'><div class='ug-default-button-hidepanel-bg'></div> <div class='ug-default-button-hidepanel-tip'></div></div>"),
      (e += "</div>"),
      E.append(e),
      (O = E.children(".ug-theme-panel")),
      1 == R.theme_enable_fullscreen_button && (y = O.children(l)),
      1 == R.theme_enable_play_button && (S = O.children(i)),
      1 == R.theme_enable_hidepanel_button &&
        (H = O.children(".ug-default-button-hidepanel")),
      w.setHtml(O),
      I && I.appendHTML(O),
      T && T.setHtml();
  }
  function i() {
    R.theme_load_panel && (a(), d()), T && (_(), T.run());
  }
  function a() {
    var e = P.getSize(),
      t = e.width;
    w.setOrientation("bottom"), w.setWidth(t), w.run();
    var n = w.getSize(),
      l = n.height;
    if (I) {
      if (((l += j.slider_textpanel_height), H)) {
        var i = H.outerHeight();
        l += i;
      }
    } else {
      var a = 0;
      H && (a = Math.max(H.outerHeight(), a)),
        y && (a = Math.max(y.outerHeight(), a)),
        S && (a = Math.max(S.outerHeight(), a)),
        (l += a);
    }
    C.setElementSize(O, t, l);
    var d = w.getElement();
    if ((C.placeElement(d, "left", "bottom"), H)) {
      var _ = H.children(".ug-default-button-hidepanel-tip");
      if ((C.placeElement(_, "center", "middle"), I)) {
        var o = H.children(".ug-default-button-hidepanel-bg"),
          r = I.getOption("textpanel_bg_opacity");
        o.fadeTo(0, r);
        var u = I.getOption("textpanel_bg_color");
        o.css({ "background-color": u });
      }
    }
    var s = 0,
      p = 0;
    if (
      (H && (p = i),
      y && (C.placeElement(y, "right", "top", 0, p), (s = y.outerWidth())),
      S)
    ) {
      var h = p;
      I || h++, C.placeElement(S, "right", "top", s, h), (s += S.outerWidth());
    }
    if (I) {
      var c = {};
      (c.slider_textpanel_padding_right = R.theme_text_padding_right + s),
        (c.slider_textpanel_padding_left = R.theme_text_padding_left),
        H && (c.slider_textpanel_margin = i),
        I.setOptions(c),
        I.positionPanel(),
        I.run();
    }
    if (H)
      if (I) C.placeElement(H, "left", "top");
      else {
        var g = d.outerHeight();
        C.placeElement(H, "left", "bottom", 0, g);
      }
  }
  function d() {
    if (A.isPanelHidden || 1 == o()) {
      var e = h();
      C.placeElement(O, 0, e), (A.isPanelHidden = !0);
    } else C.placeElement(O, 0, "bottom");
  }
  function _() {
    var e = 0,
      t = 0,
      n = P.getHeight(),
      l = n;
    if (w && 0 == s()) {
      var i = w.getSize();
      l = n - i.height;
    }
    var a = P.getWidth();
    T.setSize(a, l), T.setPosition(t, e);
  }
  function o() {
    if (!R.theme_hide_panel_under_width) return !1;
    var e = jQuery(window).width(),
      t = R.theme_hide_panel_under_width;
    return e <= t;
  }
  function r() {
    if (!R.theme_hide_panel_under_width) return !1;
    var e = o();
    1 == e ? c(!0) : g(!0);
  }
  function u() {
    i(), r();
  }
  function s() {
    return A.isPanelHidden;
  }
  function p(e, t) {
    var n = { top: e + "px" };
    O.stop(!0).animate(n, {
      duration: 300,
      easing: "easeInOutQuad",
      queue: !1,
      complete: function () {
        t && t();
      },
    });
  }
  function h() {
    var e = E.height(),
      t = e;
    if (H) {
      var n = C.getElementSize(H);
      t -= n.bottom;
    }
    return t;
  }
  function c(e) {
    if (!e) var e = !1;
    if (1 == s()) return !1;
    var t = h();
    1 == e ? C.placeElement(O, 0, t) : p(t, _),
      H && H.addClass("ug-button-hidden-mode"),
      (A.isPanelHidden = !0);
  }
  function g(e) {
    if (!e) var e = !1;
    if (0 == s()) return !1;
    var t = E.height(),
      n = O.outerHeight(),
      l = t - n;
    1 == e ? C.placeElement(O, 0, l) : p(l, _),
      H && H.removeClass("ug-button-hidden-mode"),
      (A.isPanelHidden = !1);
  }
  function f(e) {
    return (
      e.stopPropagation(),
      e.stopImmediatePropagation(),
      0 == C.validateClickTouchstartEvent(e.type) || void (1 == s() ? g() : c())
    );
  }
  function m() {
    P.showDisabledOverlay();
  }
  function b() {
    v.on(P.events.SIZE_CHANGE, u),
      v.on(P.events.GALLERY_BEFORE_REQUEST_ITEMS, m),
      S && (C.addClassOnHover(S, "ug-button-hover"), P.setPlayButton(S)),
      y &&
        (C.addClassOnHover(y, "ug-button-hover"),
        P.setFullScreenToggleButton(y)),
      H &&
        (C.setButtonMobileReady(H),
        C.addClassOnHover(H, "ug-button-hover"),
        H.on("click touchstart", f)),
      v.on(P.events.SLIDER_ACTION_START, function () {
        O.css("z-index", "1"), T.getElement().css("z-index", "11");
      }),
      v.on(P.events.SLIDER_ACTION_END, function () {
        O.css("z-index", "11"), T.getElement().css("z-index", "1");
      });
  }
  var v,
    x,
    E,
    y,
    S,
    H,
    T,
    O,
    w,
    I,
    P = new UniteGalleryMain(),
    C = new UGFunctions(),
    R = {
      theme_load_slider: !0,
      theme_load_panel: !0,
      theme_enable_fullscreen_button: !1,
      theme_enable_play_button: !1,
      theme_enable_hidepanel_button: !1,
      theme_enable_text_panel: !0,
      theme_text_padding_left: 20,
      theme_text_padding_right: 5,
      theme_text_align: "left",
      theme_text_type: "description",
      theme_hide_panel_under_width: 480,
    },
    z = {
      slider_controls_always_on: !1,
      slider_zoompanel_align_vert: "top",
      slider_zoompanel_offset_vert: 12,
      slider_textpanel_padding_top: 0,
      slider_textpanel_enable_title: !1,
      slider_textpanel_enable_description: !0,
      slider_vertical_scroll_ondrag: !0,
      strippanel_background_color: "#232323",
      strippanel_padding_top: 10,
    },
    j = {
      slider_enable_text_panel: !1,
      slider_enable_play_button: !1,
      slider_enable_fullscreen_button: !1,
      slider_enable_text_panel: !1,
      slider_textpanel_height: 50,
      slider_textpanel_align: "top",
    },
    A = { isPanelHidden: !1 };
  (this.destroy = function () {
    v.off(P.events.SIZE_CHANGE),
      v.off(P.events.GALLERY_BEFORE_REQUEST_ITEMS),
      S && P.destroyPlayButton(S),
      y && P.destroyFullscreenButton(y),
      H && C.destroyButton(H),
      v.off(P.events.SLIDER_ACTION_START),
      v.off(P.events.SLIDER_ACTION_END),
      T && T.destroy(),
      w && w.destroy(),
      I && I.destroy();
  }),
    (this.run = function () {
      t();
    }),
    (this.init = function (t, n) {
      e(t, n);
    });
}
"undefined" != typeof g_ugFunctions
  ? g_ugFunctions.registerTheme("default")
  : jQuery(document).ready(function () {
      g_ugFunctions.registerTheme("default");
    });
//# sourceMappingURL=ug-theme-default.min.js.map
