<link href="{{asset('vendor/harimayco-menu/style.css')}}" rel="stylesheet">
<style>
    #hwpwrap .customlinkdiv .howto input {
        width: 100%;
    }

    #customlinkdiv p {
        margin-bottom: 0.3rem;
    }

    #hwpwrap .nav-menus-php .item-edit {
        top: -5px;
    }

    #hwpwrap #customize-info.open .accordion-section-title:after,
    #hwpwrap .control-section.open .accordion-section-title:after,
    #hwpwrap .nav-menus-php .menu-item-edit-active .item-edit:before,
    #hwpwrap .widget.open .widget-top a.widget-action:after {
        top: 10px;
    }

    #hwpwrap .menu-item-settings input,
    #hwpwrap .menu-item-settings label,
    #hwpwrap .menu-item-settings p {
        width: 98%;
    }

    #hwpwrap .menu-item-settings {
        width: 382px;
    }

    #hwpwrap #wpbody-content{
    padding:0;
    margin-top: -15px;
    }

    #hwpwrap .nav-menus-php .add-new-menu-action {
    float: unset;
}
#hwpwrap .menu-item .submitbox .submitcancel {
    border-bottom: 1px solid #c8c8c8;
    padding: 1px 2px;
    color: #646363;
    text-decoration: none;
}
input:disabled#menu-name{
  background-color: rgba(217,216,216,0.04);
}
</style>

@if(false !== config('menu.notifications_custom_show'))
    @include(config('menu.notifications_custom_var'))
@endif
