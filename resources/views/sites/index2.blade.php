@extends('sites.layout.app')
@section('content')
	<section id="todoapp">
	    <header id="header">
		    <h1>Todos</h1>
	      	<input id="new-todo" placeholder="What needs to be done?" autofocus>
	    </header>
	    <section id="main">
		    <ul id="todo-list"></ul>
	    </section>
  	</section>
  	<div>
    	<p>Find the tutorial and code in <a href="http://adrianmejia.com/blog/2012/09/11/backbone-dot-js-for-absolute-beginners-getting-started/">here</a></p>
  	</div>  

  	<!-- Templates -->
  	<script type="text/template" id="item-template">
	    <div class="view">
	      	<input class="toggle" type="checkbox">
	      		<label><%- title %></label>
	      	<input class="edit" value="<%- title %>">
	    </div>
  	</script>  

  	<script type="text/javascript">
  		var app = {};

  		//Model

  		app.Todo = Backbone.Model.extend({
  			defaults: {
  				title: '',
  				completed: false
  			}
  		});

  		//Collection

  		app.TodoList = Backbone.Collection.extend({
  			model: app.Todo,
  			localStorage: new Store('backbone-todo')
  		});
  		app.todoList = new app.TodoList();

  		//View

  		app.TodoView = Backbone.View.extend({
  			tagName: 'li',
  			template: _.template($('#item-template').html()),
  			render: function() {
  				this.$el.html(this.template(this.model.toJSON()));
  				this.input = this.$('.edit');
  				return this;
  			},

  			initialize: function() {
  				this.model.on('change', this.render, this);
  			},
  			events: {
  				'dblclick lable': 'edit',
  				'keypress .edit': 'updateOnEnter',
  				'blur .edit': 'close'
  			},
  			edit: function(){
  				this.$el.addClass('editing');
  				this.input.focus();
  			},
  			close: function() {
  				var value = this.input.val().trim();
  				if(value) {
  					this.model.save({title: value});
  				}
  				this.$el.removeClass('editing');
  			},
  			updateOnEnter: function(e) {
  				if(e.which == 13) {
  					this.close();
  				}
  			}
  		});
  	</script>
@endsection