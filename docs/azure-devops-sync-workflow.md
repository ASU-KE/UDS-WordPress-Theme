# Azure DevOps Sync Workflow

This document explains how the GitHub Actions workflow automatically synchronizes GitHub issues to Azure DevOps work items.

## How it works

The workflow located at `.github/workflows/azure-devops-sync.yml` automatically:

1. **Monitors GitHub issues** for the following events:
   - Opened, edited, deleted
   - Closed, reopened
   - Labeled, unlabeled
   - Assigned

2. **Monitors issue comments** for:
   - Created, edited, deleted

3. **Syncs to Azure DevOps** by creating and updating corresponding work items in the Azure DevOps project

> [!IMPORTANT]
> This is a one-way synchronization from GitHub to Azure DevOps. Changes made in GitHub are automatically synced to Azure DevOps, but changes made in Azure DevOps will not sync back to GitHub.

## When it runs

The workflow triggers automatically when:
- A GitHub issue is opened, edited, closed, reopened, or deleted
- Labels are added or removed from an issue
- An issue is assigned to someone
- Comments are created, edited, or deleted on an issue

> [!NOTE]
> The workflow only runs for issues, not pull requests. Pull requests are automatically excluded.

## Configuration

The workflow is configured to sync with:
- **Azure DevOps Organization**: asuteam404
- **Project**: Web Services Project Portfolio
- **Work Item Type**: Backlog Item
- **State Mapping**:
  - Newly created issues → "To do" (when issue is first opened)
  - Open/active issues → "Doing" (when issue is reopened or actively being worked on)
  - Closed issues → "Done" (when issue is closed)

## Concurrency control

The workflow uses concurrency control to ensure that multiple simultaneous changes to the same issue are processed sequentially, preventing race conditions and ensuring data integrity.

## How to use

This workflow runs automatically - no manual intervention is required. When you:
- Create a new issue → A corresponding work item is created in Azure DevOps
- Update an issue → The work item is updated
- Close an issue → The work item is marked as "Done"
- Add a comment → The comment is synced to Azure DevOps

## Permissions

The workflow requires:
- **GitHub**: Read access to issues
- **Azure DevOps**: Personal Access Token with work item write permissions

These credentials are securely stored as GitHub repository secrets:
- `ADO_PERSONAL_ACCESS_TOKEN` - Azure DevOps access token
- `GH_PERSONAL_ACCESS_TOKEN` - GitHub access token

## Integration details

The workflow uses the custom GitHub Action [`ASU-KE/github-actions-issue-to-work-item@master`](https://github.com/ASU-KE/github-actions-issue-to-work-item) which was specifically developed to handle the synchronization between GitHub and Azure DevOps.

## Troubleshooting

If issues are not syncing to Azure DevOps:
1. Check the Actions tab in GitHub for workflow run status
2. Verify that the issue is not a pull request (PRs are not synced)
3. Check that the required secrets are configured correctly
4. Review the workflow logs for specific error messages

## Benefits

- **Automatic synchronization**: No manual data entry needed
- **Cross-platform visibility**: GitHub issues are automatically tracked in Azure DevOps
- **Consistent tracking**: Ensures all issues are tracked in both systems
- **Real-time updates**: Changes are synced immediately when they occur
