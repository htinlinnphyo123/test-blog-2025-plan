<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach (BasicDashboard\Foundations\Domain\ContactForms\ContactForm::all() as $contactForm)
                <tr>
                    <td>{{ $contactForm->name }}</td>
                    <td>{{ $contactForm->email }}</td>
                    <td>{{ $contactForm->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
