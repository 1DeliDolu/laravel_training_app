<!DOCTYPE html>
<html>

    <head>
        <title>Job Posted - {{ $job->title }}</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .header {
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            .job-details {
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 15px;
                border-radius: 5px;
                margin: 10px 0;
            }

            .translation-section {
                background-color: #e3f2fd;
                padding: 15px;
                border-radius: 5px;
                margin: 10px 0;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }

            .btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h2>🎉 Job Posted Successfully!</h2>
                <p>Your job listing "<strong>{{ $job->title }}</strong>" is now live.</p>
            </div>

            <div class="job-details">
                <h3>Job Details:</h3>
                <p><strong>Title:</strong> {{ $job->title }}</p>
                <p><strong>Company:</strong> {{ $job->company ?? 'Not specified' }}</p>
                <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>

                @if ($job->description)
                    <p><strong>Description:</strong></p>
                    <p>{{ $job->description }}</p>
                @endif
            </div>

            @if ($job->translated_description)
                <div class="translation-section">
                    <h3>🌐 AI Translation (French):</h3>
                    <p>{{ $job->translated_description }}</p>
                    <small><em>This translation was automatically generated using AI.</em></small>
                </div>
            @else
                <div class="translation-section">
                    <p>� <strong>Translation in progress...</strong></p>
                    <p>Your job description is being translated. Check back soon!</p>
                </div>
            @endif

            <div style="margin-top: 30px; text-align: center;">
                <a class="btn" href="{{ route('jobs.show', $job->id) }}">View Your Job Listing</a>
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666;">
                <p>Best regards,<br>Laravel Training App Team</p>
            </div>
        </div>
    </body>

</html>
