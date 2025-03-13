<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
        }

        h1 {
            text-align: center;
            color: #4e5b6e;
            font-size: 2.2em;
            margin-bottom: 30px;
        }

        #calendar {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #4e5b6e;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 1em;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #6c83c7;
            background-color: #e8effd;
        }

        .btn-primary {
            background-color: #6c83c7;
            border: none;
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #56688b;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a class="btn btn-primary" onclick="window.history.back();">Voltar</a>
        <h1>Calendário de Consultas</h1>

        <form id="consultation-form" onsubmit="event.preventDefault(); saveConsultation();">
            @csrf
            <div class="form-group">
                <label for="patient_id">Paciente</label>
                <select name="patient_id" id="patient_id" class="form-control" required>
                    <option value="">Selecione um paciente</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                <div id="patient_id_error" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="consultation_date">Data da Consulta</label>
                <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control"
                    required>
                <div id="consultation_date_error" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" class="form-control" required>
                <div id="description_error" class="error-message"></div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Consulta</button>
        </form>

        <div id="calendar"></div>
    </div>

    <div class="modal fade" id="editConsultationModal" tabindex="-1" aria-labelledby="editConsultationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editConsultationModalLabel">Editar Consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-consultation-form">
                        <div class="form-group">
                            <label for="edit-description">Descrição</label>
                            <input type="text" class="form-control" id="edit-description">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="save-edit">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/pt-br.min.js"></script>
    <script>
        var calendar;

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach ($consultations as $consultation)
                        {
                            id: "{{ $consultation->id }}",
                            title: "{{ $consultation->patient->name }}: {{ $consultation->description }}",
                            start: "{{ $consultation->consultation_date }}",
                            end: "{{ $consultation->consultation_date }}",
                            patient_id: "{{ $consultation->patient_id }}"
                        },
                    @endforeach
                ],
                eventDisplay: 'block',
                eventContent: function(info) {
                    return {
                        html: `<strong>${info.event.title}</strong>`
                    };
                },
                dateClick: function(info) {
                    var title = prompt('Digite o nome da consulta:');
                    if (title) {
                        var patientId = document.getElementById('patient_id').value;

                        $.ajax({
                            url: "{{ route('consults.store') }}",
                            method: 'POST',
                            data: {
                                patient_id: patientId,
                                consultation_date: info.dateStr,
                                description: title,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload(); // Recarrega a página após salvar
                            },
                            error: function(xhr) {
                                var errors = xhr.responseJSON.errors;
                                for (var field in errors) {
                                    alert(errors[field][0]);
                                }
                            }
                        });
                    }
                },
                eventClick: function(info) {
                    var modal = new bootstrap.Modal(document.getElementById('editConsultationModal'));
                    var descriptionInput = document.getElementById('edit-description');
                    var saveButton = document.getElementById('save-edit');

                    descriptionInput.value = info.event.title.split(': ')[1];

                    modal.show();

                    saveButton.onclick = function() {
                        var newDescription = descriptionInput.value;
                        if (newDescription) {
                            $.ajax({
                                url: "{{ route('consults.update', '') }}/" + info.event.id,
                                method: 'PUT',
                                data: {
                                    description: newDescription,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    alert(response.message);
                                    location.reload(); // Recarrega a página após editar
                                },
                                error: function(xhr) {
                                    var errors = xhr.responseJSON.errors;
                                    for (var field in errors) {
                                        alert(errors[field][0]);
                                    }
                                }
                            });
                        }
                    };
                }
            });

            calendar.render();
        });

        function saveConsultation() {
            var patientId = document.getElementById('patient_id').value;
            var consultationDate = document.getElementById('consultation_date').value;
            var description = document.getElementById('description').value;

            $.ajax({
                url: "{{ route('consults.store') }}",
                method: 'POST',
                data: {
                    patient_id: patientId,
                    consultation_date: consultationDate,
                    description: description,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Recarrega a página após salvar
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    for (var field in errors) {
                        document.getElementById(field + '_error').textContent = errors[field][0];
                    }
                }
            });
        }
    </script>
</body>

</html>
