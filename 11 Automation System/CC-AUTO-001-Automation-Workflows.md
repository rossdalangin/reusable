# CC-AUTO-001: AUTOMATION WORKFLOW ARCHITECTURE

**Asset ID:** CC-AUTO-001
**Category:** Automation System
**Client:** [CLIENT_NAME] | **Business:** [BUSINESS_NAME]

---

## WORKFLOW 1: NEW LEAD CAPTURE & CRM ROUTING

```text
TRIGGER: Form Submission (CC-FORM-001 or CC-FORM-002)
   │
   ▼
CONDITIONS: Check if contact exists in CRM
   ├── YES → Update Contact Record + Tag: "Lead-Magnet-Downloaded"
   └── NO  → Create New Contact Record + Tag: "New-Lead"
   │
   ▼
ACTIONS:
   1. Send Internal Slack/Email Notification to [CLIENT_NAME]
   2. Trigger Email Sequence (CC-EMAIL-001)
   3. Update Lead Score (+10 points)
   │
   ▼
DELAYS: Wait 24 Hours
   │
   ▼
END STATE: Transition to Nurture Automation Sequence
```

---

## WORKFLOW 2: STRATEGY CALL BOOKING & REMINDER ENGINE

```text
TRIGGER: Booking Event Created via [BOOKING_URL]
   │
   ▼
ACTIONS:
   1. Remove Contact from Nurture Email Sequence
   2. Add Tag: "Consultation-Scheduled"
   3. Send Instant SMS & Email Confirmation with Zoom Link
   │
   ▼
DELAYS: Wait until 24 Hours before Meeting
   │
   ▼
ACTIONS: Send 24h Reminder Email + Pre-Call Audit Worksheet
   │
   ▼
DELAYS: Wait until 1 Hour before Meeting
   │
   ▼
ACTIONS: Send 1h SMS Reminder
```
