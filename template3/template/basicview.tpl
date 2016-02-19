{% extends "winetable.tpl" %}
{# this is a comment. BodyBlock will be overridden #}
{% block BASIC %}
<p>This is the BODY</p>
<p>The old body content will not show but this.
<b>{{ secondName }}</b><br/>
some more text placed in the template.</p>
{% endblock %}