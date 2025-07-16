<!DOCTYPE html>
<html>

    <head>
        <title>Job Updated - {{ $job->title }}</title>
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
                background-color: #fff3cd;
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 20px;
                border-left: 4px solid #ffc107;
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

            .updated-section {
                background-color: #d4edda;
                padding: 15px;
                border-radius: 5px;
                margin: 10px 0;
                border-left: 4px solid #28a745;
            }

            .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #28a745;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }

            .btn:hover {
                background-color: #218838;
            }

            .update-badge {
                background-color: #ffc107;
                color: #212529;
                padding: 4px 8px;
                border-radius: 3px;
                font-size: 12px;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h2>✏️ Job Updated Successfully!</h2>
                <p>Your job listing "<strong>{{ $job->title }}</strong>" has been updated.</p>
            </div>

            <div class="updated-section">
                <h3>📝 What's New:</h3>
                <p>✅ Job information has been updated with the latest details</p>
                <p>🔄 If the description was changed, a new AI translation is being processed</p>
                <p>📧 This email notification confirms your updates</p>
            </div>

            <div class="job-details">
                <h3>Current Job Details:</h3>
                <p><strong>Title:</strong> {{ $job->title }} <span class="update-badge">UPDATED</span></p>
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
                    <p>🔄 <strong>New Translation in Progress...</strong></p>
                    <p>Since you updated the job description, a new AI translation is being processed. Check back soon!
                    </p>
                </div>
            @endif

            <div style="margin-top: 30px; text-align: center;">
                <a class="btn" href="{{ route('jobs.show', $job->id) }}">View Updated Job Listing</a>
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666;">
                <p><strong>Update Details:</strong></p>
                <p>Updated at: {{ $job->updated_at->format('F j, Y \a\t g:i A') }}</p>
                <p>Created at: {{ $job->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666;">
                <p>Best regards,<br>Laravel Training App Team</p>
            </div>
        </div>
    </body>

</html>
