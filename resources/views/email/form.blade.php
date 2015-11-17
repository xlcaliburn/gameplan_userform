<style>
table, th, td {
   border: 1px solid black;
}
</style>

<h1>Attention</h1>
 
<p>A new user: {{ $username }} has just been created with the following details.</p>
<table>
	<tr>
		<td>User</td>
		<td>Phone </td>
		<td>Email</td>
	</tr>
	<tr>
		<td>{{ $username }}</td>
		<td>{{ $phone }}</td>
		<td>{{ $email }}</td>
	</tr> 
</table>