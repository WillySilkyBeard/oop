<div class="card">
	<div class="card-header" data-background-color="green">
		<h4 class="title">Задачи</h4>
		<p class="category">Выполняйте свои задачи</p>
	</div>
	<div class="card-content table-responsive">
		<table class="table">
			<thead class="text-primary">
				<th>#</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Дата</th>
			</thead>
			<tbody>
				<? foreach($comments as $one): ?>
					<tr>
						<td><?=$counter++ ?></td>
						<td><a href="article?id=<?=$one['id_article']?>"><?=$one['title']?></a></td>
						<td><?=$one['content']?></td>
						<td><?=$one['dt']?></td>
					</tr>
				<? endforeach;?>
			</tbody>
		</table>
	</div>
</div>